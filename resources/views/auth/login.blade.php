@extends('layouts.site')

@section('content')
<section id="login" class="bg-img-9"> 
    <div class="login-container"> 
        
        <div class="container text-center">
            
            <div class="col-md-12 dark">
                <h3 class="white mb5">Login to your account</h3> 
                <p class="subheading white">Welcome to Purefive</p>
                <div class="login-form pt30 pb30">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}  
                        
                        <input class="form-email bg-transparent" type="text" placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        
                        <input class="form-password bg-transparent" type="password" placeholder="Password" name="password" required> 
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                        <div class="actions">
                            {{-- <a href="{{ route('password.request') }}" class="pull-left dark-grey">Forgot Password?</a> --}}
                            {{-- <a href="#" class="pull-right dark-grey">Login with <i class="fa fa-facebook-official"></i></a> --}}
                        </div>

                        <input class="btn btn-primary btn-login" type="submit" value="Login">

                    </form>  
                </div> 
                <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                <p class="terms">By logging in, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</p>
            </div>   
            
        </div>
        
    </div> 
</section>
@endsection
