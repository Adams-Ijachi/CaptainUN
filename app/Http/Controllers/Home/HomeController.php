<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Update,
    Cap,
    Goal,
    Comment

};
use Debugbar;

class HomeController extends Controller
{


    public function index(Request $request)
    {
        # code...
        $caps_country = Cap::where('is_approved', true)->where('type', 'country')->paginate(5, ['*'], 'country');
        $caps_company = Cap::where('is_approved', true)->where('type', 'company')->paginate(5, ['*'], 'company');
        return view('welcome' , compact('caps_country', 'caps_company'));
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
