
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
        
            <x-table.search placeholder="Search email , name or country"  wire:model="search" type="text" id="form1" class="form-control" />

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
                <th>Email</th>
                <th>Username</th>

                <th>Status</th>
                <th>Country</th>
                <th> Action </th>
            </x-slot >


            
            <x-slot name="rows"  >
                
                @foreach($volunteers as $index => $user)
                    <tr>
                    <th> 
                        {{ $index + 1 }}


                    </th>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }} </td>
                    <td>
                        
                            <span class="label {{ $user->status[0] }} rounded">{{ $user->status[1] }}</span>
                        
                        
                    </td>
                    <td>{{ $user->country }}</td>
                    
                    <td>
                        <span class="d-flex">

                            <button style="cursor:pointer"  type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#basicModal" wire:click="edit({{ $user->id }})"  data-placement="top" data-toggle="modal" data-target="#basicModal" title="Edit">
                                <i class="fa fa-pencil color-muted m-r-5"></i> 
                            </button>
                            <button class="btn btn-danger"  style="cursor:pointer" data-toggle="tooltip" wire:click="delete({{ $user->id }})" data-placement="top" title="Close">
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
        {{ $volunteers->links() }}
    </div>

 
    <form wire:submit.prevent="save">

    <x-modal wire:model="showModal" :showModal="$showModal" >
        <x-slot name="title" >
            Edit Volunteers
        </x-slot >

        <x-slot name="content" >
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" :error="$errors->first('editing.email')" wire:model="editing.email" class="form-control" id="exampleInputEmail1" >
                
                    @error('editing.email') <span class="error">{{ $message }}</span> @enderror



            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" wire:model="editing.full_name" class="form-control" id="exampleInputEmail1" >
                @error('editing.full_name') <span class="error">{{ $message }}</span> @enderror

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" wire:model="editing.username" class="form-control" id="exampleInputEmail1" >
                @error('editing.username') <span class="error">{{ $message }}</span> @enderror

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Country</label>
                <input type="text" wire:model="editing.country" class="form-control" id="exampleInputEmail1" >
                @error('editing.country') <span class="error">{{ $message }}</span> @enderror

            </div>

           

                       
            <div class="form-group">
                 <label for="exampleInputPassword1">Status</label>
                <select class="form-control" wire:model="editing.is_approved" >
                    <option value="0" >Deactivate </option>
                    <option value="1">Activate</option>

                </select>
            </div>


            
           

        </x-slot >

        <x-slot name="footer" >
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </x-slot >

    </x-modal>
    </form>
        
        
</div>