<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job Applications' => '#']" />

    @forelse ($applications as $application)
        <x-job-offer-card :jobOffer="$application->jobOffer">
            <div class="flex items-center justify-between text-xs text-slate-500">
                <div>
                    <div>
                        Applied {{ $application->created_at->diffForHumans() }}
                    </div>

                    <div>
                        Other {{ Str::plural('applicant', $application->jobOffer->job_applications_count - 1) }}
                        {{ $application->jobOffer->job_applications_count - 1 }}
                    </div>

                    <div>
                        Your asking salary ${{ number_format($application->expected_salary) }}
                    </div>

                    <div>
                        Average asking salary
                        ${{ number_format($application->jobOffer->job_applications_avg_expected_salary) }}
                    </div>
                </div>

                <div>
                    <form action="{{ route('my-job-applications.destroy', $application) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit">Cancel</x-button>
                    </form>

                </div>
            </div>
        </x-job-offer-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-400 p-8">
            <div class="text-center font-medium">
                No job applications yet !
            </div>

            <div class="text-center">
                Go find some jobs
                <a class="text-indigo-500 hover:underline" href="{{ route('jobOffer.index') }}">
                    here
                </a>
            </div>
        </div>
    @endforelse
</x-layout>
