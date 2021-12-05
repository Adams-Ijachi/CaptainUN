
<div>
    

    <div class="container-fluid">

        <div>

      
        </div>
      
        <x-table.table title="Comments"  >
            <x-slot name="headers" >
                <th>#</th>
                <th>Comment</th>
                <th>Created At</th>
                <th>Status </th>
                <th>Comment For</th>
            </x-slot >


            
            <x-slot name="rows"  >
                
                @foreach($comments as $index => $comment)
                    <tr>
                    <td> 
                        {{ $index + 1 }}


                    </td>
                    <td>
                       {{ $comment->comment }}
                    </td>
                
                    
                    <td>{{ $comment->date_for_humans }}</td>
                    
                    <td>
                        <span class="d-flex">
                        <div wire:loading.remove wire:target="toggle({{ $comment->id }})">
                            <button class="label {{ $comment->status[0] }} btn"  style="cursor:pointer" data-toggle="tooltip" wire:click="toggle({{ $comment->id }})" data-placement="top" title="Aprrove or Pending">
                                
                                {{ $comment->status[1] }}

                            </button>
                        </div>

                            <div wire:loading wire:target="toggle({{ $comment->id }})">

                              Changing Status...
                        
                            </div>
                        </span>
                    </td>

                    <td>{{ $comment->associated_model }}</td>


                    </tr>
                        @endforeach

            </x-slot >
            

                        
                        
        </x-table.table > 
                    
    </div>
            <!-- #/ container -->

    <div class="d-flex flex-row-reverse mr-4 p-3">
        {{ $comments->links() }}
    </div>
        
        
</div>