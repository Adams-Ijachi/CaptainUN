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
                            <h3 class="card-title">CAP Details</h3>
                        </div>
                        <div class="card-body">
                            <h1>
                                {{ $cap->name }}
                            </h1>

                            
                            <p>
                                {{ $cap->description }}
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
                                          <h2 class="card-widget__title">{{ $cap->rating }}</h2>
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

                    <livewire:table :table_headers="['Name','Description','Rating']" :model="$cap" :model_type="'goal'" />
                    <livewire:table :table_headers="['Title','Description','Created At']" :model="$cap" :model_type="'update'" />


                    
                    
                    



                </div>
            </div>
            </div>
            <livewire:commenting :cap="$cap" />

        </section>

       
        <x-home.footer />

        

    </x-slot>
</x-home.body>

