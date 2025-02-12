<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Job Offers' => route('jobOffer.index'),
        $jobOffer->title => route('jobOffer.show', $jobOffer),
        'Apply' => '#',
    ]" />

    <x-job-offer-card :$jobOffer />

    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your Job Application
        </h2>

        <form action="{{ route('jobOffer.application.store', $jobOffer) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="expected_salary" class="mb-2 block tet-sm font-medium text-slate-900">
                    Expected Salary
                </label>
                <x-text-input type='number' name='expected_salary' />
            </div>

            <div class="mb-4">
                <label class="mb-2 block tet-sm font-medium text-slate-900">Upload CV</label>
                <x-text-input type='file' name='cv' />
            </div>

            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>
