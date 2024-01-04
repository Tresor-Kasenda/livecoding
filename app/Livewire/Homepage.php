<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Homepage extends Component
{
    public string $search;


    #[Layout('layouts.guest')]
    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.homepage', [
            'events' => Event::query()
                ->paginate(10),
        ]);
    }
}
