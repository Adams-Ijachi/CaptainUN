<div class="d-flex">
    <div wire:loading.remove class="rate">
        <input type="radio" hidden  wire:click="addRating" wire:model="rating" id="star5" name="rating" value="5" @if($rating == 5) checked @endif>
        <label for="star5"  title="text">5 stars</label> 
        <input type="radio" hidden wire:click="addRating" wire:model="rating"  id="star4" name="rating" value="4" @if($rating == 4) checked @endif>
        <label for="star4" title="text">4 stars</label>
        <input type="radio" hidden wire:click="addRating" wire:model="rating" id="star3" name="rating" value="3" @if($rating == 3) checked @endif>
        <label for="star3" title="text">3 stars</label>
        <input type="radio" hidden wire:click="addRating" wire:model="rating" id="star2" name="rating" value="2" @if($rating == 2) checked @endif>
        <label for="star2" title="text">2 stars</label>
        <input type="radio" hidden wire:click="addRating" wire:model="rating" id="star1" name="rating" value="1" @if($rating == 1) checked @endif>
        <label for="star1" title="text">1 star</label>
    </div>
    <div wire:loading wire:target="addRating">

    Changing Status...

    </div>
    <div>
     @error('rating') <span class="alert alert-danger">{{ $message }}</span> @enderror


    </div>


    

   
</div>


