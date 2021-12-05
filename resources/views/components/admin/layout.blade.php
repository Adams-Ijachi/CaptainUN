

<x-layout>
    <x-slot name="styles">
        {{ $adminStyles }}
    </x-slot>
    <x-slot name="title">
        {{ $adminTitle }}
    </x-slot>

    <x-slot name="sidenav" >
        <x-admin.side-nav  />
    </x-slot>
    
    

    <x-slot name="content">
        {{ $adminContent  }}
        
    </x-slot>



    

    <x-slot name="scripts">
        {{ $adminScripts }}
    </x-slot >


</x-layout>