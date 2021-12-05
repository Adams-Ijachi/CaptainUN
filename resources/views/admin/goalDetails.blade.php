<x-admin.layout>

    <x-slot name="adminStyles">
    </x-slot>

    <x-slot name="adminTitle">
        {{ __('Goal Details') }}
    </x-slot>


    <x-slot name="adminContent">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Goal</a></li>
                    </ol>
                </div>
            </div>


            <x-card.card >
                <x-slot name="body" >
                <div>
                        <div class="card-header">CAP info</div>
                        <div class="card-body">
                            
                            <h5 class="card-title text-uppercase">
                                {{
                                    $goal->name
                                }}
                             </h5>
                            <p class="card-text">
                                {{ $goal->description }}
                            </p>
                        </div>
                        
                    </div>

                    <div class="col-lg-3 mt-5" >
                        

                      <div class="card card-widget">
                            <div class="card-body gradient-3">
                                <div class="media">
                                    <span class="card-widget__icon"><i class="icon-star"></i></span>
                                    <div class="media-body">
                                        <h2 class="card-widget__title">{{ $goal->avg_rating }}</h2>
                                        <h5 class="card-widget__subtitle">Average ratings</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                   </div>
                    
                </x-slot>

            </x-card.card>
            
           


            <livewire:goal-updates :goal="$goal" />
            
    </x-slot>

    


 

    <x-slot name="adminScripts">
      
    </x-slot>   





</x-admin.layout>