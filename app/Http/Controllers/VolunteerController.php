<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Traits\RatingTraits;


use App\Models\{
    Update,
    Cap,
    Goal,
    Comment

};
use Debugbar;

class VolunteerController extends Controller
{
    //
    use RatingTraits;

    public function index(Request $request)
    {
        # code...
        

        $caps_country = Cap::where('is_approved', true)->where('type', 'country')->orderByDesc('avg_rating')->paginate(10, ['*'], 'country');
        $caps_company = Cap::where('is_approved', true)->where('type', 'company')->orderByDesc('avg_rating')->paginate(10, ['*'], 'company');
        return view('welcome' , compact('caps_country', 'caps_company'));
    }

    public function about(Request $request)
    {
        # code...
        return view('about');
    }


    public function search(Request $request)
    {
        # code...
        $cap = Cap::find($request['search']);
        
        

        return view('cap_detail' , compact('cap'));
    }

    public function getCap(Cap $cap)
    {
      
        return view('cap_detail' , compact('cap'));
    }

    // getGoal
    public function getGoal(Goal $goal)
    {
        


        return view('goal_detail' , compact('goal'));
    }
}
