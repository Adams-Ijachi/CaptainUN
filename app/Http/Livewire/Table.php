<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Debugbar;
use App\Models\Cap;
use App\Models\Goal;
use App\Models\Update;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;



class Table extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $table_headers;
    public Cap $model;

    public $model_type ;


    public $readyToLoad = false;

 

    public function loadPosts()

    {

        $this->readyToLoad = true;

    }

    public function render()
    {
      
        
        if($this->model_type=='goal'){
            $return = Goal::where('cap_id', $this->model->id)->orderByDesc('created_at')->paginate(10,['*'], 'goal'); 
        }elseif($this->model_type=='update'){
              $return = Update::whereHasMorph('updatable', Cap::class, function (Builder $query) {
                $query->where('id', $this->model->id);
            })->orderByDesc('created_at')->paginate(10,['*'], 'update'); 
        
           
        }

        return view('livewire.table', [
            'table_headers' => $this->readyToLoad ?  $this->table_headers : [],
            'models' => $return 
        ]);
    }

    

    public function mount($table_headers,$model,$model_type,$model_name=NULL)
    {
        # code...
        $this->table_headers = $table_headers;
        if($model_name=='goal'){
            $this->goal = $model;
        }
        else{
            $this->model = $model;

        }
      
        
        $this->model_type = $model_type;


    }
}
