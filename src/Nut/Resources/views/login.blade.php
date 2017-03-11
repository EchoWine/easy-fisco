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

<div class="login-page">
    <div class="form">
        <form class="register-form">
            <input type="text" name='username' placeholder="name"/>
            <input type="password" name='password' placeholder="password"/>
            <input type="password" name='password_repeat' placeholder="password x2"/>
            <input type="text" name='email' placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form">
            <input type="text" name='username' placeholder="username"/>
            <input type="password" name='password' placeholder="password"/>
            <button type='submit'>login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
    </div>
</div>
@endsection


