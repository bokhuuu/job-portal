<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Job Offers' => route('jobOffers.index'), $jobOffer->title => '#']" />
    <x-job-offer-card :$jobOffer />
</x-layout>
