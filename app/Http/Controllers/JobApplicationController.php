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

        $validatedData = $request->validate([
            'expected_salary' => 'required|min:1|max:200000',
            'cv' => 'required|file|mimes:pdf|max:2048'
        ]);

        $file = $request->file('cv');
        $path = $file->store('cvs', 'local');

        $jobOffer->jobApplications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path
        ]);

        return redirect()->route('jobOffer.show', $jobOffer)
            ->with('success', 'Job application submitted');
    }


    public function destroy(string $id)
    {
        //
    }
}
