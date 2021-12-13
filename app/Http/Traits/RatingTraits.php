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


    public function getCapType()
    {
        # code...
        return [
            '1'=> ['country','Country'],
            '2' =>     ['company', 'Company']   
            ];
    }

    // average rating for a goal
    public function averageRating($goal_id)
    {
        $ratings = Rating::where('goal_id', $goal_id)->get();
        $total = 0;
        foreach ($ratings as $rating) {
            $total += $rating->rating;
        }
        // get goal and add average rating
        $goal = Goal::find($goal_id);
        // solve division by zero
        if ($ratings->count() == 0) {
            $goal->avg_rating = 0;
        } else {
            $goal->avg_rating = $total / $ratings->count();
        }
       
        $goal->save();
        return $goal->avg_rating;
        
    }

    // calculate average goal for a cap
    public function averageGoal($cap_id)
    {
        $goals = Goal::where('cap_id', $cap_id)->get();
        $total = 0;
        foreach ($goals as $goal) {
            $total += $goal->avg_rating;
        }
        // get cap and add average rating
        $cap = Cap::find($cap_id);
        // solve division by zero
        if ($goals->count() == 0) {
            $cap->avg_rating = 0;
        } else {
            $cap->avg_rating = $total / $goals->count();
        }

        $cap->save();
        return $cap->avg_rating;
    }
  



    
}