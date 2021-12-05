<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class Volunteers extends Component
{
   
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public User $editing;
    public $showModal=false;
    public $selectedStatus;


    protected function rules ()
    {
        return [
            'editing.full_name' => 'required|min:3',
            'editing.email' => 'required|email|unique:users,email,' . $this->editing->id,
            'editing.is_approved' => 'required|boolean',
            'editing.country' => 'required|min:3|string',
            'editing.username' => 'required|min:3|string'
        ];
    }

 
    public function render()
    {
        
       
        return view('livewire.volunteers', [
            'volunteers' => User::HasRole(1)->VolunteerSearch($this->search,1)->orderByDesc('created_at')->paginate(5),
        ]);
    }


    public function mount()
    {
        $this->editing = User::make(['is_approved'=>1]);
    }


    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    public function create()
    {
        # code...
        $this->editing = User::make();
    }



    public function save ()
    {
        $this->validate();
        if(!$this->editing->password){
            $this->editing->password = 'password';
        }
      
        $this->editing->user_type = 1;
        $this->editing->save();
        $this->create();
        
    }


    // edit
    public function edit(User $user)
    {
        # code...

        $this->editing = $user;
        $this->selectedStatus = $user->is_approved;
        $this->showModal = true;
        
    }


    // delete

    public function delete(User $user)
    {
        # code...

        $user->delete();
        $this->mount();
        $this->render();
        session()->flash('message', 'Delete Sucessfull.');

    }
}
