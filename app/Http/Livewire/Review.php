<?php

namespace App\Http\Livewire;

use Livewire\Component;


use Debugbar;
use App\Models\{
    Goal,
    Rating
    
};
use App\Http\Traits\RatingTraits;

use Livewire\WithPagination;
use Auth;
class Review extends Component
{
    use WithPagination, RatingTraits;
    protected $paginationTheme = 'bootstrap';

    public $is_editing = false;
    public Goal $goal ;
    public Rating $review;
    public $rating = 0;


    public function render()
    {
      
        $this->getRating();
        return view('livewire.review');
    }

    public function mount(Goal $goal)
    {
        $this->review = Rating::make();
        $this->goal = $goal;
    }

    // get the rating of the goal for the current user
    public function getRating()
    {
        $rating = $this->goal->ratings()->where('user_id', Auth::id())->first();
        if ($rating) {
            $this->review = $rating;
            $this->rating = $rating->rating;
        }

    }

    // addRating
    public function addRating()
    {
       
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        

        $this->goal->ratings()->updateOrCreate([
            'user_id' => Auth::id(),
            'goal_id' => $this->goal->id,
        ], [
            'rating' => $this->rating,
        ]);

        $this->rating = 0;
        
    }
}
