<x-layout>
    <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />

    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my_jobs.create') }}">Add New</x-link-button>
    </div>

    @forelse ($myJobs as $myJob)
        <x-job-offer-card :jobOffer="$myJob">
            <div class="text-xs text-slate-500">
                @forelse ($myJob->jobApplications as $application)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div>Applied {{ $application->created_at->diffForHumans() }}</div>
                            <div>Download CV</div>
                        </div>

                        <div>${{ number_format($application->expected_salary) }}</div>
                    </div>
                @empty
                    <div class="mb-4">No applications yet</div>
                @endforelse

                <div class="flex space-x-2">
                    @if (!$myJob->deleted_at)
                        <x-link-button href="{{ route('my_jobs.edit', $myJob) }}">Edit</x-link-button>

                        <form action="{{ route('my_jobs.destroy', $myJob) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button>Delete</x-button>
                    @endif
                    </form>
                </div>

            </div>
        </x-job-offer-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-400 p-8">
            <div class="text-center font-medium">
                No jobs yet
            </div>
            <div class="text-center ">
                Post your first job
                <a href="{{ route('my_jobs.create') }}" class="text-indigo-500 hover:underline">here!</a>
            </div>
        </div>
    @endforelse

</x-layout>
