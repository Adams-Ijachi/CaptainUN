<x-admin.layout>
    <x-slot name="adminTitle">
        {{ __('Dashboard') }}
    </x-slot>

    <x-slot name="adminStyles">
         
    </x-slot>

    <x-slot name="adminContent">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Volunteers</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $total_volunteers }}</h2>
                                                             



                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Cap</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">
                                        {{ $total_cap }}
                                    </h2>
                                    
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-home"></i></span>
                            </div>
                        </div>
                    </div>

                    @if(Auth::user()->user_type == '0')
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Undps </h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">
                                    {{ $total_undp }}

                                    </h2>
                                    
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Approved Caps</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">
                                        {{ $total_approved_cap }}
                                    </h2>
                                    
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
    </x-slot>

    <x-slot name="adminScripts">
        ooo
    </x-slot>   





</x-admin.layout>