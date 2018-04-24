@extends('layouts.site')

@section('content')


<section id="sign-up" class="bg-img-10"> 
    <div class="sign-up-container"> 
        
        <div class="container text-center">
            
            <div class="col-md-12 dark"> 
                <h3 class="mb5 white">Create your account</h3> 
                <p class="subheading white">Welcome to Purefive</p>
                <div class="login-form pt30 pb30">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                       
                        <input class="sign-up-first-name bg-transparent" type="text" placeholder="Name"  name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif


                        <input class="sign-up-email bg-transparent" type="text" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                        {{-- <input class="bg-transparent" type="text" placeholder="Phone Number"  name="phone_number" value="{{ old('phone_number') }}" required autofocus>
                        @if ($errors->has('phone_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif --}}


                        <input class="sign-up-password bg-transparent" type="password" placeholder="Password" name="password" required>
                        <input class="sign-up-password bg-transparent" id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                        
                        <div class="actions">
                            <p class="dark-grey">By creating an account, you agree to the <a href="#">Terms of Service</a>.</p> 
                        </div>
                         
                        <input class="btn btn-sm btn-primary btn-sign-up" type="submit" value="Sign Up">
                    </form>  
                </div> 
                <p>Or <a href="{{route('login')}}">login</a> usign an existing account</p> 

            </div>   
            
        </div>
        
    </div> 
</section>
@endsection
