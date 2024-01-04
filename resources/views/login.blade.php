@extends('layouts.master')
@section('content')
<section class="login-wrapper">
    <div class="container">
        <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
            <form action="{{ route('user.login') }}" method="post">
                @csrf
                <img class="img-responsive" alt="logo" src="img/logo.png">
                @if (session('login_error'))
                    <h6 style="color: red;">{{ session('login_error') }}</h6>
                @endif
                <input type="email" name="email" class="form-control input-lg" placeholder="Email">
                <input type="password" name="password" class="form-control input-lg" placeholder="Password">
                <label><a href="">Forget Password?</a></label>
                <button type="submit" class="btn btn-primary" style="background-color: #8d4545;">Login</button>
                <p>Be a part of us- <a href="{{ route('user.register') }}">Create An Account</a></p>
            </form>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#loginErrorModal').modal('show');
    });
</script>
@endsection
 
