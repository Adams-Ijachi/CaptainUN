<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    Update,
    Cap,
    Goal,
    Comment

};

use Auth;
use App\Http\Traits\RatingTraits;


class AdminController extends Controller
{
    //
    use RatingTraits;


    public function index()
    {
        $total_volunteers = $this->totalUsers(1);
        $total_undp = $this->totalUsers(2);
        $total_cap = $this->totalCaps(3);
        $total_approved_cap = $this->approvedCaps();
       
        return view('admin.home', compact('total_volunteers', 'total_undp', 'total_cap', 'total_approved_cap'));
    }

    // climateBackstop

    public function climateBackstop()
    {
        return view('admin.undp');
    }


    public function volunteers()
    {
        # code...
        return view('admin.volunteers');
    }

    public function cap()
    {
        # code...
        return view('admin.cap');
    }


    public function capDetails(Cap $cap)
    {
        
        return view('admin.capDetails', compact('cap'));
    }


    // goalDetails

    public function goalDetails(Goal $goal)
    {

        return view('admin.goalDetails', compact('goal'));
    }

    // comments

    public function comments()
    {
        # code...
        
        return view('admin.comments');
    }


    // logout user

    public function logout()
    {
        # code...
        Auth::logout();
        return redirect('/login');
    }

    





   


}
