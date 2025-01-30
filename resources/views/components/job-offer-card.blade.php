<x-card class="mb-4">
    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-medium"> {{ $jobOffer->title }}</h2>
        <div class="text-slate-500"> ${{ number_format($jobOffer->salary) }}</div>
    </div>

    <div class="mb-4 flex justify-between text-sm text-slate-500 items-center">
        <div class="flex space-x-4">
            <div>company</div>
            <div>{{ $jobOffer->location }}</div>
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag>{{ Str::ucfirst($jobOffer->experience) }}</x-tag>
            <x-tag>{{ $jobOffer->category }}</x-tag>
        </div>
    </div>

    <p class="text-sm text-slate-500 mb-4">
        {!! nl2br(e($jobOffer->description)) !!}
    </p>

    {{ $slot }}
</x-card>
