<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

use App\Models\{
    Update,
    Cap
};
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Auth;

class Updates extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public Update $editing;
    public Cap $cap;
    public $showModal=false;
    public $selectedStatus;
   


    protected function rules ()
    {
        return [
            'editing.title' => 'required|min:3',
            'editing.description' => 'required|string',
        ];
    }


    public function render()
    {
    
        return view('livewire.updates',
        [
            'updates' => Update::whereHasMorph('updatable', Cap::class, function (Builder $query) {
                $query->where('id', $this->cap->id);
            })->where('title', 'like', '%' . $this->search . '%')->latest()->paginate(10),
            
        ]);
    }


    public function mount($cap)
    {
      
        $this->cap = $cap;
        

        
    }

    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    public function create()
    {
        # code...
        $this->editing = Update::make();
    }



    public function save ()
    {
        $this->validate();

        $this->editing->updatable()->associate($this->cap);

        $this->editing->save();

        $this->create();
        
    }


    public function edit(Update $update)
    {
        # code...

        $this->editing = $update;
        
        $this->showModal = true;
        

    }


    public function delete(Update $update)
    {
        # code...

        $update->delete();
        
        $this->render();
        session()->flash('message', 'Delete Sucessfull.');

    }


}
