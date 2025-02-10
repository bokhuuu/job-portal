<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobApplicationController extends Controller
{


    public function create(JobOffer $jobOffer)
    {
        Gate::authorize('apply', $jobOffer);
        return view('jobOffer_application.create', ['jobOffer' => $jobOffer]);
    }


    public function store(JobOffer $jobOffer, Request $request)
    {
        Gate::authorize('apply', $jobOffer);
        $jobOffer->jobApplications()->create([
            'user_id' => $request->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|min:1|max:200000'
            ])
        ]);

        return redirect()->route('jobOffer.show', $jobOffer)
            ->with('success', 'Job application submitted');
    }


    public function destroy(string $id)
    {
        //
    }
}
