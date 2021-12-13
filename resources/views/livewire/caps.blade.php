
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
                <button class="btn btn-primary" type="button" wire:click="create" class="btn btn-primary" data-toggle="modal" data-target="#basicModal" data-placement="top"  >
                    New <i class="fa fa-plus color-danger"></i>
                </button>
               
            </div>


        </div>
        <x-table.table title="Voluntters" >
            <x-slot name="headers" >
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Status</th>
                <th> Created By </th>
                <th>Created At</th>
                <th>Action </th>
            </x-slot >


            
            <x-slot name="rows"  >
                
                @foreach($caps as $index => $cap)
                    <tr>
                    <td> 
                        {{ $index + 1 }}


                    </td>
                    <td>
                       <a href="{{ route('admin.cap.details',['cap'=>$cap->id]) }}">{{ $cap->name }}</a> 
                    </td>
                    <td>{{ $cap->description }}</td>
                    <td>{{ $cap->type }} </td>
                    <td>
                        
                    <span class="label {{ $cap->status[0] }} rounded">{{ $cap->status[1] }}</span>
                        
                        
                    </td>
                    <td>{{ $cap->user->full_name }}</td>
                    <td>{{ $cap->date_for_humans }}</td>
                    
                    <td>
                        <span class="d-flex">

                            <button style="cursor:pointer"  type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#basicModal" wire:click="edit({{ $cap->id }})"  data-placement="top" data-toggle="modal" data-target="#basicModal" title="Edit">
                                <i class="fa fa-pencil color-muted m-r-5"></i> 
                            </button>
                            <button class="btn btn-danger m-1"  style="cursor:pointer" data-toggle="tooltip" wire:click="delete({{ $cap->id }})" data-placement="top" title="Close">
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
        {{ $caps->links() }}
    </div>

 
    <form wire:submit.prevent="save">

    <x-modal wire:model="showModal" :showModal="$showModal" >
        <x-slot name="title" >
            Edit Caps
        </x-slot >

        <x-slot name="content" >
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text"  wire:model="editing.name" class="form-control" id="exampleInputEmail1" >
                
                    @error('editing.name') <span class="error">{{ $message }}</span> @enderror



            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" wire:model="editing.description" class="form-control" id="exampleInputEmail1" >
                @error('editing.description') <span class="error">{{ $message }}</span> @enderror

            </div>
                  
            <div class="form-group">
                 <label for="exampleInputPassword1">Type</label>
                <select class="form-control" wire:model="editing.type" >
                    <option value="company" >Company </option>
                    <option value="country">Country</option>

                </select>
                @error('editing.type') <span class="error">{{ $message }}</span> @enderror

            </div>

            

            <div class="form-group">
                 <label for="exampleInputPassword1">Status</label>
                <select class="form-control" wire:model="editing.is_approved" >
                    <option value="0" >Deactivate </option>
                    <option value="1">Activate</option>

                </select>
                @error('editing.is_approved') <span class="error">{{ $message }}</span> @enderror

            </div>


            
           

        </x-slot >

        <x-slot name="footer" >
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </x-slot >

    </x-modal>
    </form>
        
        
</div>