<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Booking extends Component
{
    public Event $event;

    #[Rule(['required', 'date'])]
    public string $date = '';


    public function mount(Event $event): void
    {
        $this->event = $event;
    }


    #[Layout('layouts.app')]
    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.booking');
    }


    public function booking()
    {
        $this->validate();

        if ($this->event->bookings()->where('user_id', auth()->id())->exists()) {
            session()->flash('error', 'You have already booked this event.');
            return;
        }

        if ($this->event->start_date > $this->date || $this->event->end_date < $this->date) {
            session()->flash('error', 'The date must be between the start and end date of the event.');
            return;
        }

        $this->event->bookings()->create([
            'user_id' => auth()->id(),
            'date' => $this->date,
            'price' => $this->event->price,
        ]);
    }
}
