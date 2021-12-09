<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Comment;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Auth;

class Comments extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    
    // public Goal $editing;
    public $showModal=false;
    public $selectedStatus;
   


    public function render()
    {
        return view('livewire.comments',
        [
            'comments' => Comment::orderByDesc('created_at')->paginate(10),
        ]);
    }

    
    public function toggle(Comment $comment)
    {
        # code...

        $comment->is_approved = !$comment->is_approved;
        $comment->save();
        
        $this->render();
        // session()->flash('message', 'Comment status updated successfully');

    }

 
}
