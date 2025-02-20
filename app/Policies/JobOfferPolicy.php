<?php

namespace App\Policies;

use App\Models\JobOffer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobOfferPolicy
{

    public function viewAny(?User $user): bool
    {
        return true;
    }


    public function viewAnyEmployer(?User $user): bool
    {
        return true;
    }


    public function view(?User $user, JobOffer $jobOffer): bool
    {
        return true;
    }


    public function create(User $user): bool
    {
        return $user->employer !== null;
    }


    public function update(User $user, JobOffer $jobOffer): bool|Response
    {
        if ($jobOffer->employer->user_id !== $user->id) {
            return false;
        }

        if ($jobOffer->jobApplications()->count() > 0) {
            return Response::deny('You cannot update a job offer that has applications');
        }

        return true;
    }


    public function delete(User $user, JobOffer $jobOffer): bool
    {
        return $jobOffer->employer->user_id === $user->id;
    }


    public function restore(User $user, JobOffer $jobOffer): bool
    {
        return $jobOffer->employer->user_id === $user->id;
    }


    public function forceDelete(User $user, JobOffer $jobOffer): bool
    {
        return $jobOffer->employer->user_id === $user->id;
    }


    public function apply(User $user, JobOffer $jobOffer): bool
    {
        return !$jobOffer->hasUserApplied($user);
    }
}
