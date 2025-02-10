<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Job Offers' => route('jobOffer.index'),
        $jobOffer->title => route('jobOffer.show', $jobOffer),
        'Apply' => '#',
    ]" />
    <x-job-offer-card :$jobOffer>
        <p class="text-sm text-slate-500 mb-4">
            {!! nl2br(e($jobOffer->description)) !!}
        </p>

        @can('apply', $jobOffer)
            <x-link-button :href="route('jobOffer.application.create', $jobOffer)">
                Apply
            </x-link-button>
        @else
            <div class="text-center text-sm font-medium text-slate-500">
                You already applied to this job
            </div>
        @endcan

    </x-job-offer-card>

    <x-card>
        <h2 class="mb-4 text-lg">
            more from <span class="font-bold">{{ $jobOffer->employer->company_name }}</span>
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ($jobOffer->employer->jobOffers as $relatedJobOffer)
                <div class="mb-4 flex justify-between">
                    <div class="">
                        <div>
                            <a href="{{ route('jobOffer.show', $relatedJobOffer) }}" class="font-bold text-blue-400">
                                {{ $relatedJobOffer->title }}

                            </a>
                        </div>
                        <div class="text-xs">
                            {{ $relatedJobOffer->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-xs">
                        ${{ number_format($relatedJobOffer->salary) }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
