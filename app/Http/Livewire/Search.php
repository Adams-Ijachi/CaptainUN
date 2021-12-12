<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cap;
use Debugbar;
use App\Http\Traits\RatingTraits;
    //
    

class Search extends Component
{

        //
    use RatingTraits;

    public $search = '';
    public $searchType = '';
    public $searchResults ;
    public $button = 'disabled';
    public $capValue = '';


    public function render()
    {
        return view('livewire.search');
    }

    public function updatedSearchType($search)
    {
        $this->searchResults = Cap::where('is_approved', true)->where('type', 'like', '%' . $search . '%')->get();
        
  
    }
}
