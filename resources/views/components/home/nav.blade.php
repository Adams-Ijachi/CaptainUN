<nav>
    <div class="bg-green-50 "  >
        <div class="w-11/12 lg-w-4-5 mx-auto py-6">
            <div class="text-size text-center text-header">
                <a href="{{ route('home') }}" class="p-2 rounded-xl text-white bg-blue-500 hover:border-transparent hover:text-black hover:bg-blue-200 mr-2">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </a> 
                <a href="{{ route('about') }}" class="p-2 rounded-xl text-white bg-blue-500 hover:border-transparent hover:text-black hover:bg-blue-200 mr-2">
                    ABOUT
                </a> 
                <a href="/contact-us" class=" p-2 rounded-xl text-white bg-blue-500 hover:border-transparent hover:text-black hover:bg-blue-200 mr-2 ">
                    CONTACT US
                </a> 
                @auth
                    
                    @if(Auth::user()->user_type == 1)
                        <span>
                            <a href="{{ route('login') }}" class="p-2 rounded-xl text-white bg-blue-500 hover:border-transparent hover:text-black hover:bg-blue-200 mr-2">Volunteers</a>
                        </span>
                    @else
                      
                        <span>
                            <a href="{{ route('admin.home') }}" class="p-2 rounded-xl text-white bg-blue-500 hover:border-transparent hover:text-black hover:bg-blue-200 mr-2">DASHBOARD</a>
                        </span>

                    @endif
                @endauth
                @guest
                    <span>
                        <a href="{{ route('login') }}" class="p-2 rounded-xl text-white bg-blue-500 hover:border-transparent hover:text-black hover:bg-blue-200 mr-2">Volunteers</a>
                    </span>
                @endguest

            </div>
        </div>
    </div>
</nav>