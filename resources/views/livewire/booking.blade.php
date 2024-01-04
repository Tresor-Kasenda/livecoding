<div>
    <div class="max-w-7xl mx-auto py-20">
        <h2>Event / <span class="text-sm font-light text-blue-600">{{ $event->name }}</span></h2>
        <div>
            <span class="text-red-500 font-semibold text-sm">{{ $event->price }}</span>
            <div class="py-2">
                <span
                    class="text-sm">{{ $event->start_date->format('Y-m-d') }} - {{ $event->end_date->format('Y-m-d') }}</span>
            </div>
            <a class="text-blue-600" href="{{ route('organiser') }}">Contact organiser</a>
        </div>

        <form wire:submit.prevent="booking" class="py-12 flex flex-col">
            <input class="w-full" type="date" name="date" wire:model="date" id="date">

            <span class="text-lg py-8">Price:  $ {{ $event->price }}</span>

            <button class="py-2 px-3 rounded-full bg-indigo-600 text-white" type="submit">book your event</button>
        </form>
    </div>
</div>
