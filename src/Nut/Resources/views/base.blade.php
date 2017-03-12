@extends('Nut::layout')


@section('scripts')
    

@endsection

@section('styles')
    
@endsection

@section('body')
	
    <div class="container-fluid">
		<header class='row'>
			<div class='col-2 page-left header-logo-col'>
				<a href="{{ route('dashboard') }}" class='logo'>
					<i class="fa fa-university" aria-hidden="true"></i>
					EasyFisco
				</a>
			</div>
			<div class='col-10 page-content'>
				<ul class="nav justify-content-end">
					<li class='nav-item'>
						<a href="{{ route('dashboard') }}">
							<span class='fa fa-users'></span>
							<br>
							Profile
						</a>
					</li>
					<li class='nav-item'>
						<a href="{{ route('dashboard') }}">
							<span class='fa fa-sign-out'></span>
							<br>
							Logout
						</a>
					</li>
				</ul>
			</div>
		</header>
	</div>
    <div class="container-fluid page">

    	<div class='row'>
    		<div class='col-2 page-left'>

    			<ul class='nav nav-left flex-column justify-content-start'>
	    			<li class='nav-item'>
	    				<a href="{{ route('dashboard') }}" class='nav-link'>
	    					<span class='fa fa-home'></span> Dashboard
	    				</a>
	    			</li>
	    			<li class='nav-item'>
	    				<a href="{{ route('declarations') }}" class='nav-link'>
	    					<span class='fa fa-archive'></span> Dichiarazioni
	    				</a>
	    			</li>
    			</ul>
    		</div>

    		<div class='col-10 page-content content'>
    			@section('content')

    			@show
    		</div>
    	</div>
    </div>


@endsection


