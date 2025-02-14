<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class MyJobController extends Controller
{

    public function index()
    {
        return view('my_job.index');
    }


    public function create()
    {
        return view('my_job.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:' . implode(',', JobOffer::$experience),
            'category' => 'required|in:' . implode(',', JobOffer::$category)
        ]);

        auth()->user()->employer->jobOffers()->create($validatedData);

        return redirect()->route('my_jobs.index')
            ->with('success', 'Job created successfully');
    }


    public function show(string $id)
    {
        //
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
