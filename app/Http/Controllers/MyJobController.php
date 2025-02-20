<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class MyJobController extends Controller
{

    public function index()
    {
        Gate::authorize('viewAnyEmployer', JobOffer::class);
        return view(
            'my_job.index',
            [
                'myJobs' =>  auth()->user()->employer
                    ->jobOffers()
                    ->with(['employer', 'jobApplications', 'jobApplications.user'])
                    ->withTrashed()
                    ->get()
            ]

        );
    }


    public function create()
    {
        Gate::authorize('create', JobOffer::class);
        return view('my_job.create');
    }


    public function store(JobRequest $request)
    {
        Gate::authorize('create', JobOffer::class);
        auth()->user()->employer->jobOffers()->create($request->validated());

        return redirect()->route('my_jobs.index')
            ->with('success', 'Job created successfully');
    }


    public function edit(JobOffer $myJob)
    {
        Gate::authorize('update', $myJob);
        return view(
            'my_job.edit',
            ['myJob' => $myJob]
        );
    }


    public function update(JobRequest $request, JobOffer $myJob)
    {
        Gate::authorize('update', $myJob);
        $myJob->update($request->validated());

        return redirect()->route('my_jobs.index')
            ->with('success', 'Job updated successfully');
    }


    public function destroy(JobOffer $myJob)
    {
        $myJob->delete();

        return redirect()->route('my_jobs.index')
            ->with('success', 'Job deleted successfully');
    }
}
