<x-card class="mb-4">
    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-medium"> {{ $jobOffer->title }}</h2>
        <div class="text-slate-500"> ${{ number_format($jobOffer->salary) }}</div>
    </div>

    <div class="mb-4 flex justify-between text-sm text-slate-500 items-center">
        <div class="flex items-center space-x-4">
            <div>{{ $jobOffer->employer->company_name }}</div>
            <div>{{ $jobOffer->location }}</div>
            @if ($jobOffer->deleted_at)
                <span class="text-xs text-red-500">Deleted</span>
            @endif
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag>
                <a href="{{ route('jobOffer.index', ['experience' => $jobOffer->experience]) }}">
                    {{ Str::ucfirst($jobOffer->experience) }}
                </a>
            </x-tag>
            <x-tag>
                <a href="{{ route('jobOffer.index', ['category' => $jobOffer->category]) }}">
                    {{ $jobOffer->category }}
                </a>
            </x-tag>
        </div>
    </div>

    {{ $slot }}
</x-card>
