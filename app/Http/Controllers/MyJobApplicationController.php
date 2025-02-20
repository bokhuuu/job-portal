<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{


    public function index()
    {

        return view(
            'my_job_application.index',
            [
                'applications' => auth()->user()->jobApplications()
                    ->with([
                        'jobOffer' => fn($query) => $query->withCount('jobApplications')
                            ->withAvg('jobApplications', 'expected_salary')
                            ->withTrashed(),
                        'jobOffer.employer'
                    ])
                    ->latest()
                    ->get()
            ]

        );
    }


    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with('success', 'Job application removed');
    }
}
