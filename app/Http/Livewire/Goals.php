<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Goal;


use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class Goals extends Component
{


    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public Goal $editing;
    public $showModal=false;
    public $selectedStatus;
    public $cap_id;
    public $cap_name;

    protected function rules ()
    {
        return [
            'editing.name' => 'required|min:3',
            'editing.description' => 'required|string',
            'editing.is_approved' => 'required|boolean',
            
        ];
    }

    public function render()
    {

        
        return view('livewire.goals',
        [
            'goals' => Goal::where('cap_id', $this->cap_id)->where('name', 'like', '%' . $this->search . '%')->orderByDesc('created_at')->paginate(10),
            
        ]);
        

    }

    public function mount($cap)
    {
      
        $this->cap_id = $cap->id;
        $this->cap_name = $cap->name;
    }

    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    public function create()
    {
        # code...
        $this->editing = Goal::make();
    }



    public function save ()
    {
        $this->validate();
        $this->editing->cap_id = $this->cap_id;
        $this->editing->save();
        $this->create();
        
    }


    // edit
    public function edit(Goal $goal)
    {
        # code...

        $this->editing = $goal;
        $this->selectedStatus = $goal->is_approved;
        $this->showModal = true;
        
    }


    // delete

    public function delete(Goal $goal)
    {
        # code...

        $goal->delete();
        
        $this->render();
        session()->flash('message', 'Delete Sucessfull.');

    }
}
