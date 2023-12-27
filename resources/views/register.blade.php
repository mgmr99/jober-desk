@extends('layouts.master')
@section('content')
<section class="login-wrapper">
    @if (session('register_error'))
                    <h6 style="color: red;">{{ session('register_error') }}</h6>
    @endif
    <div class="container">
        <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
            <form action="{{ route('user.register') }}" method="post">
                @csrf
                <img class="img-responsive" alt="logo" src="img/logo.png">
                <input type="text" name="name" class="form-control input-lg" placeholder="Your Name" required> 
                <input type="email" name="email" class="form-control input-lg" placeholder="Your Email" required>
                <input type="password" name="password" class="form-control input-lg" placeholder="Password" required>
                <label><a href="">Forget Password?</a></label>
                <button type="submit" class="btn btn-primary">Register</button>
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </form>
        </div>
    </div>
</section>
@endsection
 
