

<x-default-layout>
    <x-slot name="title">
        Register
    </x-slot>

    
    
    

    <x-slot name="content">
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4>Welcome!</h4></a>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            
                                               
                                            
                                        </ul>
                                    </div>
                                @endif

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>

                                @endif

        
                                <form class="mt-5 mb-5 login-input" method="POST"   action="{{route('register.post')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="full_name" class="form-control" placeholder="Full Name">
                                    </div>
                                   
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    

                                    <div class="form-group">
                                        <input type="text" name="country" class="form-control" placeholder="Country">
                                    </div>
                                    <div class="form-group">
                                        <input type="username" name="username" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">Sign Up</button>
                                </form>
                                <p class="mt-5 login-form__footer">You have account? <a href="{{  route('login') }}" class="text-primary">Sign In</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-slot>



</x-default-layout>