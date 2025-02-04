<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Job Offers' => route('jobOffers.index'), $jobOffer->title => '#']" />
    <x-job-offer-card :$jobOffer>
        <p class="text-sm text-slate-500 mb-4">
            {!! nl2br(e($jobOffer->description)) !!}
        </p>
    </x-job-offer-card>

    <x-card>
        <h2 class="mb-4 text-lg">
            more from <span class="font-bold">{{ $jobOffer->employer->company_name }}</span>
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ($jobOffer->employer->jobOffers as $relatedJobOffer)
                <div class="mb-4 flex justify-between">
                    <div class="">
                        <div class="textfont-bold">
                            <a href="{{ route('jobOffers.show', $relatedJobOffer) }}" class="text-blue-500">
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
