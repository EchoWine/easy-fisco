@extends('Nut::layout')


@section('scripts')
    
    <script src="{{ asset('src/Nut/Auth/AuthServiceProvider.js') }}"></script>

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
    <form class="form-signin">       
    <h2 class="form-signin-heading">Please login</h2>
        <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
        <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
</div>
@endsection


