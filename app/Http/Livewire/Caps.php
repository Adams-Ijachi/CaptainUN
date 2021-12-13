<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Cap;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Auth;

class Caps extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public Cap $editing;
    public $showModal=false;
    public $selectedStatus;

    protected function rules ()
    {
        return [
            'editing.name' => 'required|min:3|unique:caps,name',
            'editing.description' => 'required|string',
            'editing.is_approved' => 'required|boolean',
            'editing.type' => 'required|min:3|string'
        ];
    }


    public function render()
    {
        return view('livewire.caps',[
            'caps' => Cap::with('user')->search($this->search)->orderByDesc('created_at')->paginate(5),
        ]);
    }


    public function mount()
    {
        $this->editing = Cap::make();
    }


    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    public function create()
    {
        # code...
        $this->editing = Cap::make();
    }


    public function save ()
    {
        $this->validate();
        $this->editing->user_id = Auth::user()->id;
        $this->editing->save();
        $this->create();
        
    }

    public function edit(Cap $cap)
    {
        # code...

        $this->editing = $cap;
        $this->showModal = true;
        
    }

    public function delete(Cap $cap)
    {
        # code...

        $cap->delete();
        $this->mount();
        $this->render();
        session()->flash('message', 'Delete Sucessfull.');

    }



}
