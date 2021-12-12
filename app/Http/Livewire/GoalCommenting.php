<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Debugbar;
use App\Models\{
    Comment,
    Goal
};
use Livewire\WithPagination;
use Auth;
use Illuminate\Database\Eloquent\Builder;

class GoalCommenting extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $is_editing = false;
    public Goal $goal ;
    public Comment $editing;

  
    public function rules()
    {
        return [
            'editing.comment' => 'required|min:3',
        ];
    }



    public function render()
    {
        return view('livewire.goal-commenting',
        [
            'comments' => Comment::with('user')->whereHasMorph('commentable', Goal::class, function (Builder $query) {
                $query->where('id', $this->goal->id);
            })->latest()->paginate(10),
        ]);
    }

    public function mount($goal){
        $this->goal = $goal;
        $this->editing = Comment::make();
    }

    public function create()
    {
        # code...
        $this->editing = Comment::make();
    }

    


    public function addComment()
    {
        $this->validate();
      
        if($this->is_editing){
            $this->editing->update();
        }else{
            $this->editing->commentable()->associate($this->goal);
            $this->editing->user_id = Auth::id();
            $this->editing->save();
        }
        $this->is_editing = false;
        $this->create();


    
    }

    public function editComment(Comment $comment)
    {
        $this->is_editing = true;
        $this->editing = $comment;
    }

        // deleteComment
    public function deleteComment(Comment $comment)
    {
        
        $comment->delete();
        
        
        $this->render();
        session()->flash('message', 'Delete Sucessfull.');
    }



}