<div class=" mb-2 " wire:init="loadPosts">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Caps Goals</h4>
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
                                
                                        @if($model_type == 'goal')
                                            @foreach($models as $index => $data)

                                            <tr>
                                            <td> 
                                                {{ $index + 1 }}
                                            </td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td><span class="label gradient-1 btn-rounded">{{ $data->rating }}%</span>
                                            </tr>
                                            @endforeach
                                        @elseif($model_type == 'update')
                                        @foreach($models as $index => $update)
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
                                        @endforeach
                                        @endif
                                                
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex flex-row-reverse mr-4 p-3">
                                    {{ $models->links() }}
                                </div>
                            </div>
                        </div>

</div>
