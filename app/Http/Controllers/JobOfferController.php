<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{

    public function index()
    {

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


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(JobOffer $jobOffer)
    {
        return view('jobOffer.show', ['jobOffer' => $jobOffer->load('employer.jobOffers')]);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
