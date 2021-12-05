
<div>
    

    <div class="container-fluid">

        <div>

        @if (session()->has('message'))

            <div class="alert alert-success">

                {{ session('message') }}

            </div>

        @endif

        </div>
        <div class="p-2 d-flex">
        
            <x-table.search placeholder="Search name"  wire:model="search" type="text" id="form1" class="form-control" />

            <div class="add-btn p-3">
                <button class="btn btn-primary" type="button" wire:click="create" class="btn btn-primary" data-toggle="modal" data-target="#updateModal" data-placement="top"  >
                    New Update <i class="fa fa-plus color-danger"></i>
                </button>
               
            </div>


        </div>
        <x-table.table title="Updates for {{$cap->name}}"  >
            <x-slot name="headers" >
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Action </th>
            </x-slot >


            
            <x-slot name="rows"  >
                
                @foreach($updates as $index => $update)
                    <tr>
                    <td> 
                        {{ $index + 1 }}


                    </td>
                    <td>
                       {{ $update->title }}
                    </td>
                    <td>{{ $update->description }}</td>
                    
                    <td>{{ $update->date_for_humans }}</td>
                    
                    <td>
                        <span class="d-flex">

                            <button style="cursor:pointer"  type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $update->id }})"  data-placement="top" data-toggle="modal" data-target="#basicModal" title="Edit">
                                <i class="fa fa-pencil color-muted m-r-5"></i> 
                            </button>
                            <button class="btn btn-danger m-1"  style="cursor:pointer" data-toggle="tooltip" wire:click="delete({{ $update->id }})" data-placement="top" title="Close">
                                <i class="fa fa-close color-danger"></i>
                            </button>
                        </span>
                    </td>


                    </tr>
                        @endforeach

            </x-slot >
            

                        
                        
        </x-table.table > 
                    
    </div>
            <!-- #/ container -->

    <div class="d-flex flex-row-reverse mr-4 p-3">
        {{ $updates->links() }}
    </div>

 
    <form wire:submit.prevent="save">

    <x-modal wire:model="showModal" :showModal="$showModal" id="updateModal" >
        <x-slot name="title" >
            
        </x-slot >

        <x-slot name="content" >
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text"  wire:model="editing.title" class="form-control" id="exampleInputEmail1" >
                
                    @error('editing.title') <span class="error">{{ $message }}</span> @enderror



            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" wire:model="editing.description" class="form-control" id="exampleInputEmail1" >
                @error('editing.description') <span class="error">{{ $message }}</span> @enderror

            </div>
           

        </x-slot >

        <x-slot name="footer" >
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </x-slot >

    </x-modal>
    </form>
        
        
</div>