<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{

    public $type;
    public $adminlinks = ['Home' => '/', 'About' => '/about', 'Contact' => '/contact','Create'];
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($type)
    {
        //
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if($this->type == 'admin'){
            return view('components.navbar',['links' => $this->adminlinks]);
        }
        
    }
}
