<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Debugbar;
use App\Models\Goal;
use App\Models\Update;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;


class TableGoal extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $table_headers;
    public Goal $model;


    public $readyToLoad = false;

 

    public function loadPosts()

    {

        $this->readyToLoad = true;

    }



    public function render()
    {
        return view('livewire.table-goal',
        [
            'models' => $this->readyToLoad ?  Update::whereHasMorph('updatable', Goal::class, function (Builder $query) {
                $query->where('id', $this->model->id);
            })->orderByDesc('created_at')->paginate(10,['*'], 'update') : [],
        ]);
    }

    public function mount($table_headers,$model)
    {
        # code...
        $this->table_headers = $table_headers;
        
        $this->model = $model;


    }
}
