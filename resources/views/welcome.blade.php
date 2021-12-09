<x-home.body >
    <x-slot name="title">
        Climate Action Plan Tracker and Information Network - CAPTAIN
    </x-slot>


    <x-slot name="content">
        <main>
            <div class="bg-green-50">

                <!-- hero text -->
                <div class="hero_div">
                    <div class="hero_div_logo">
                        <div class="">
                            <img src="{{ asset('img/captainun-logo.a3e5c25.png') }}" class="rounded-full ">
                        </div> 
                        <div class="hero_div_logo_text text-blue-500">
                            CAPTAIN UN
                        </div>
                    </div> 
                    <div class="mt-3 text-center py-2 px-3">
                        <span class="text-base font-bold">
                            Climate Action Plan Tracker and Information Network of the United Nations
                        </span>
                                <br> 
                        <span class="text-sm">
                            <i>Saving our world together</i>
                        </span>
                    </div>
                </div>
                    <!-- Map section -->

                <div class="py-0 mx-auto w-100 lg-py-16  lg-flex">
                        <div class="w-100">
                            <x-home.map />
                        </div>
                        <div class="w-100 lg:w-1/5 form_head_con" >
                        <div class="w-50 lg:w-full mx-auto form_con">
                            <livewire:search />
                            <div class="mt-5 text-center md:text-right d-flex">
                                <img src="{{ asset('img/unicef-logo.37657ae.png')}}" class="h-24 w-50  mw-100 inline"> 
                                <img src="{{ asset('img/undp-logo.3432b09.jpg')}}" class="h-24 w-50 mw-100 inline">
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </main>

       
        <section style="background-color: #f3f3f9;" class="mb-3 p-3">
            <div class="table_section container  mb-4">
                <div class="table_section_title">
                    <h2>
                        
                        <span class="text-gray-700 text-center" style="font-weight:900">
                           <h3>CAPS</h3> 
                        </span>
                    </h2>


                    <div class="col mb-2 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Countries with Caps</h4>
                                <div class="table-responsive">
                                    <table class="table header-border table-hover verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Progress</th>
                                                <th scope="col">Rating</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($caps_country as $index => $country)
                                            <tr>
                                            <td> 
                                                {{ $index + 1 }}
                                            </td>
                                                <td>
                                                <a href="{{ route('getCap',['cap'=>$country->id]) }}">  {{ $country->name }} </a>
                                                </td>
                                                <td>{{ $country->description }}</td>
                                                <td>
                                                    <div class="progress" style="height: 10px">
                                                        <div class="progress-bar gradient-1" style="width: {{ $country->rating }}%;" role="progressbar"><span class="sr-only">70% Complete</span>
                                                        </div>
                                                    </div> 
                                                </td>
                                                
                                                <td><span class="label gradient-1 btn-rounded">{{ $country->rating }}%</span>
                                            <tr>
                                            @endforeach
                                                
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex flex-row-reverse mr-4 p-3">
                                    {{ $caps_country->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col mb-2 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Companies with Caps</h4>
                                <div class="table-responsive">
                                    <table class="table header-border table-hover verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Progress</th>
                                                <th scope="col">Rating</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($caps_company as $index => $company)
                                            <tr>
                                            <td> 
                                                {{ $index + 1 }}
                                            </td>
                                                <td>
                                                <a href="{{ route('getCap',['cap'=>$company->id]) }}">  {{ $company->name }} </a>
                                                </td>
                                                <td>{{ $company->description }}</td>
                                                <td>
                                                    <div class="progress" style="height: 10px">
                                                        <div class="progress-bar gradient-1" style="width: {{ $company->rating }}%;" role="progressbar"><span class="sr-only">70% Complete</span>
                                                        </div>
                                                    </div> 
                                                </td>
                                                
                                                <td><span class="label gradient-1 btn-rounded">{{ $company->rating }}%</span>
                                            <tr>
                                            @endforeach
                                                
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex flex-row-reverse mr-4 p-3">
                                    {{ $caps_company->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    



                </div>
            </div>
            </div>


          <x-home.footer />
        </section>
       </div>
    </x-slot>

</x-home.body>

