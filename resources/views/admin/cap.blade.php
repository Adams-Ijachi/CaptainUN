<x-admin.layout>

    <x-slot name="adminStyles">
    </x-slot>

    <x-slot name="adminTitle">
        {{ __('Caps') }}
    </x-slot>


    <x-slot name="adminContent">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }})">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Caps</a></li>
                    </ol>
                </div>
            </div>
            
            <livewire:caps />
    </x-slot>

    


 

    <x-slot name="adminScripts">
      
    </x-slot>   





</x-admin.layout>