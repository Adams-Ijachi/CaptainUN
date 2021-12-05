<?php

namespace App\Http\Traits;
use App\Models\Goal;
use App\Models\Rating;
use App\Models\User;
use App\Models\Cap;


trait RatingTraits
{
    

    // total number of users with type of user
    public function totalUsers($type)
    {
        return User::where('user_type', $type)->count();
    }

    // total number of approved caps

    public function totalCaps()
    {
        return Cap::count();
    }


    // Caps with is_approved = 1
    public function approvedCaps()
    {
        return Cap::where('is_approved', 1)->count();
    }



    
}