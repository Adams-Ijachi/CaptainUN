
<!-- Modal -->
<div wire:ignore.self    class="modal fade " id="{{ $modalId }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$content}}
            </div>
            <div class="modal-footer">
                {{$footer}}
                
            </div>
        </div>
    </div>
</div>
