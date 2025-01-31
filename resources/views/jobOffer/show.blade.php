<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Job Offers' => route('jobOffers.index'), $jobOffer->title => '#']" />
    <x-job-offer-card :$jobOffer>
        <p class="text-sm text-slate-500 mb-4">
            {!! nl2br(e($jobOffer->description)) !!}
        </p>
    </x-job-offer-card>
</x-layout>
