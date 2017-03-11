@extends('Nut::layout')


@section('scripts')
    
    <script src="{{ asset('src/Nut/Auth/AuthServiceProvider.js') }}"></script>
    <script src="{{ asset('src/Nut/Auth/AuthManager.js') }}"></script>
    <script src="{{ asset('src/Nut/Auth/AuthEvent.js') }}"></script>

    <script>

        App.addProviders([
            AuthServiceProvider,
        ]);

    </script>

@endsection

@section('styles')
    
        <link rel='stylesheet' href="{{ asset('src/Nut/Auth/assets/login.css') }}">
@endsection

@section('body')
<div class="wrapper">
    <form class="form-signin" id='form-login' method='POST'>       
    <h2 class="form-signin-heading">Please login</h2>

        <div>
            <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
        </div>

        <div>
            <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        </div>
        <!--<label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
        </label>
        -->
        <div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
        </div>
    </form>
</div>
@endsection


