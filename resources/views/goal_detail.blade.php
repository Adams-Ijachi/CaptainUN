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
                                          <h2 class="card-widget__title">{{ $goal->avg_rating }}</h2>
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
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1"  />
                    <label for="star1" title="text">1 star</label>
                </div>
                </div>
            </div>

            </div>
        </div>
    </div>

        
            <livewire:goal-commenting :goal="$goal" />

        </section>

       
        <x-home.footer />

        

    </x-slot>
</x-home.body>

