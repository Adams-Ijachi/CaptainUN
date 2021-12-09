<form  action="{{ route('search') }}" method="GET" class="mt-5 text-xs">
    <div>
        <div class="w-100">
            <select class="bg-white border shadow-sm w-100 rounded h-10 p-2 text-gray-700 focus:outline-none"  wire:model="searchType">
                <option value="" disabled="" selected="">Select Cap Type</option>
                @foreach($this->getCapType() as $cap)
                    <option value="{{ $cap[0] }}">{{ $cap[1] }}</option>
            
                @endforeach
                
            </select>
        </div>
       
        @if($searchResults)
        <div class="w-100">
            <select class="mt-3 bg-white border shadow-sm w-100 rounded h-10 p-2 text-gray-700 focus:outline-none" wire:model="capValue" name="search">
                <option value="" disabled="" selected="">Select Cap</option> 
                @foreach($searchResults as $result)
                    <option value="{{ $result->id }}">{{ $result->name }}</option>
                @endforeach
            </select>
        </div>
        @endif
    </div>
    <div>
        <button  class="mt-3 bg-blue-200 w-100 form-btn h-10 rounded text-blue-400 hover:bg-black" @if(!$capValue) disabled @endif  >
          View CAP
        </button>
    </div>
</form>
