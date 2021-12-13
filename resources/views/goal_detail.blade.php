<x-home.body >
    <x-slot name="title">
        Climate Action Plan Tracker and Information Network - CAPTAIN
    </x-slot>

    <x-slot name="content">
       <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title">Goal Details</h3>
                        </div>
                        <div class="card-body">
                            <h1>
                                {{ $goal->name }}
                            </h1>

                            
                            <p>
                                {{ $goal->description }}
                            </p>
                        </div>
                    </div>


                </div>
                <div class="col-lg-3 mt-5  "  >
                        

                        <div class="card card-widget">
                              <div class="card-body gradient-3">
                                  <div class="media">
                                      <span class="card-widget__icon"><i class="icon-star"></i></span>
                                      <div class="media-body">
                                          <h2 class="card-widget__title">{{ $goal->rating }}</h2>
                                          <h5 class="card-widget__subtitle">Average ratings</h5>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      
                     </div>
                
        </div>
        <section style="background-color: #f3f3f9;" class="mb-3 ">
            <div class="table_section container  mb-4">
                <div class="table_section_title">
                    <h2>
                    
                        
                    </h2>

                   
                    <livewire:table-goal :table_headers="['Title','Description','Created At']" :model="$goal"  />


                </div>
            </div>
            </div>

            <div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="d-flex flex-column col-md-8">
            <div class="coment-bottom bg-white p-2 px-4">
            <div class="container ">
                <h2>
                    Rating
                </h2>

                <div>

                
                @unless(Auth::user())
                    <div class="alert alert-danger">
                        <p>
                            You must be logged in to Rate.
                        </p>
                    </div>
                @endunless
                @auth
                <div wire:key>
                <livewire:review  wire:key="1" :goal="$goal" />

                </div>
                @endauth
           
                </div>
            </div>

            </div>
        </div>
    </div>

        <div wire:key  >
         <livewire:goal-commenting :goal="$goal" wire:key="2" />
        </div>

        </section>

       
        <x-home.footer />

        

    </x-slot>
</x-home.body>

