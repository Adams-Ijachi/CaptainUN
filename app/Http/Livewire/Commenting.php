<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Debugbar;
use App\Models\{
    Comment,
    Cap
};
use Livewire\WithPagination;
use Auth;
use Illuminate\Database\Eloquent\Builder;


class Commenting extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $is_editing = false;
    public Cap $cap ;
    public Comment $editing;


    public function rules()
    {
        return [
            'editing.comment' => 'required|min:3',
        ];
    }
    
    public function render()
    {
        return view('livewire.commenting',
        [
            'comments' => Comment::with('user')->whereHasMorph('commentable', Cap::class, function (Builder $query) {
                $query->where('id', $this->cap->id);
            })->latest()->paginate(1),
        ]);
    }

    public function mount($cap){
        $this->cap = $cap;
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
        Debugbar::info($this->editing, 'editing');
        if($this->is_editing){
            $this->editing->update();
        }else{
            $this->editing->commentable()->associate($this->cap);
            $this->editing->user_id = Auth::id();
            $this->editing->save();
        }
        $this->is_editing = false;
        $this->create();


        // $this->editing->commentable()->associate($this->cap->id);
        // $this->editing->user_id = Auth::user()->id;
        // $this->editing->save();
        // $this->create();



        // $comment->comment = $this->comment;
        // $comment->user_id = Auth::user()->id;
        // $comment->commentable()->associate($this->cap->id);
        // $comment->save();

        // $this->comment = '';
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
