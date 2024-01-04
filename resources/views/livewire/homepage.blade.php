<div>
    <div class="max-w-7xl mx-auto py-20">
        <div class="mx-auto max-w-md py-6">
            <input type="text" name="name" id="name" wire:model.live="search" class="w-full rounded-full "
                   placeholder="search your event">
        </div>
        <div class="grid grid-cols-3 gap-5 ">
            @foreach($events as $event)
                <div class="border border-slate-200 p-3">
                    <h1>{{ $event->name }}</h1>
                    <span class="text-red-500 font-semibold text-sm">{{ $event->price }}</span>
                    <div class="py-2">
                    <span
                        class="text-sm">{{ $event->start_date->format('Y-m-d') }} - {{ $event->end_date->format('Y-m-d') }}</span>
                    </div>
                    <a href="{{ route('bookings.create', $event->id) }}"
                       class="bg-blue-400 px-3 py-2 text-center rounded-full text-white">Book</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
