<div class=" mb-2 " wire:init="loadPosts">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Goals Update</h4>
                                <div class="table-responsive">
                                    <table class="table header-border table-hover verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                @foreach($table_headers as $header)
                                                <th>{{ $header }}</th>
                                                @endforeach

                                            </tr>
                                        </thead>
                                        <tbody>
                                
                                        @forelse($models as $index => $update)
                                         <tr>
                                            <td> 
                                                {{ $index + 1 }}


                                            </td>
                                            <td>
                                                {{ $update->title }}
                                            </td>
                                            <td>{{ $update->description }}</td>
                                            
                                            <td>{{ $update->date_for_humans }}</td>
                                            </tr>
                                        @empty
                                        <tr class="text-center h2">
                                            <td colspan="4">No data</td>
                                        </tr>
                                        @endforelse
                                  
                                                
                                        </tbody>
                                    </table>
                                </div>

                                @if($models)
                                <div class="d-flex flex-row-reverse mr-4 p-3">
                                    {{ $models->links() }}
                                </div>
                                @endif
                            </div>
                        </div>

</div>
