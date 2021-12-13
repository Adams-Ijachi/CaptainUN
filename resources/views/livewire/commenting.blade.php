<div>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="d-flex flex-column col-md-8">

                <div class="coment-bottom bg-white p-2 px-4">
                    
                    <h2>
                        Comments
                    </h2>
                    @unless(Auth::user())
                        <div class="alert alert-danger">
                            <p>
                                You must be logged in to comment.
                            </p>
                        </div>
                    @endunless
                    <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                        
                        @auth
                        <div class="ratings">
                            
                    


                        </div>
                        <textarea type="text" wire:model.defer="editing.comment" class="form-control mr-3" placeholder="Add comment">
                        </textarea>
                        

                        <button class="btn btn-primary" type="button" wire:click="addComment" wire:loading.attr="disabled">Comment</button>
                        @endauth
                    </div>

                </div>
                <div>
                    @error('editing.comment') <span class="alert alert-danger">{{ $message }}</span> @enderror


                </div>

                <div>
                    @if (session()->has('message'))

                    <div class="alert alert-success">

                        {{ session('message') }}

                    </div>

                    @endif
                </div>
                @forelse($comments as $comment)
                <div class="commented-section card mt-2 p-5">
                        <div class="d-flex flex-row align-items-center commented-user">
                            <h5 class="mr-2">{{$comment->user->full_name}}</h5>
                            <span class="dot mb-1"></span>
                            <span class="mb-1 ml-2">{{$comment->date_for_humans}}</span>
                        </div>
                        <div class="comment-text-sm m-1 mb-2">
                            <span>
                                {{$comment->comment}}
                            </span>
                        </div>
                        @auth
                        @if(Auth::user()->id == $comment->user_id)
                        <div class="edit-section">

                            <button class="btn btn-primary" type="button" wire:click="editComment({{$comment->id}})">Edit</button>
                            <button class="btn btn-danger" type="button" wire:click="deleteComment({{$comment->id}})">Delete</button>

                        </div>
                        @endif
                        @endauth
                </div>
                @empty
                <div class="commented-section mt-2">
                    <div class="comment-text-sm">
                        <span>
                        No Comments
                        </span>
                    </div>
                        
                </div>
                @endforelse
            </div>
            <div class="m-2">
                    {{$comments->links()}}
            </div>
        </div>
    </div>  
    
</div>