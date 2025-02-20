<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobOfferController extends Controller
{

    public function index()
    {

        Gate::authorize('viewAny', JobOffer::class);
        $filters = request()->only(
            'search',
            'min_salary',
            'max_salary',
            'experience',
            'category'
        );

        return view(
            'jobOffer.index',
            ['jobOffers' => JobOffer::with('employer')->latest()->filter($filters)->get()]
        );
    }


    public function show(JobOffer $jobOffer)
    {
        Gate::authorize('view', $jobOffer);
        return view(
            'jobOffer.show',
            ['jobOffer' => $jobOffer->load('employer.jobOffers')]
        );
    }
}
