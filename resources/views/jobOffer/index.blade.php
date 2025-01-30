<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Job Offers' => route('jobOffers.index')]" />

    @foreach ($jobOffers as $jobOffer)
        <x-job-offer-card class="mb-4" :$jobOffer>
            <div>
                <x-link-button :href="route('jobOffers.show', $jobOffer)">
                    Show
                </x-link-button>
            </div>
        </x-job-offer-card>
    @endforeach
</x-layout>
