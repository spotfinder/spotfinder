@extends('layouts.master-view')

@section('top-script')
	<link href="/css/signin.css" rel="stylesheet">
@stop
@section('content')
	<style>
		#mainContent {
			margin-top: 105px;	
		}

		h2{
			text-align: center;
		}

		body {
			background-color: #4EA784;
			background-image: url("/assets/images/patterns/pattern-1.png");
		}
	</style>

	<div class="blog-post" id="mainContent">

@if (!Auth::user())  

	<h2> Sign Up </h2>
	{{ Form::open(array('action' => 'RegisterController@store', 'class' => 'form-signin'  )) }}

@else
	<h2> Edit Profile </h2>

	{{ Form::model($user, array('action' => array('RegisterController@update', $user->id), 'method' => 'put', 'class' => 'form-signin' )) }}
	
@endif
	<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
	<p>{{ Form::label('first_name', 'First Name') }}
	{{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name')) }}</p>
	</div>

	<div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
	<p>{{ Form::label('last_name', 'Last Name') }}
	{{ Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}</p>
	</div>

	<div class="form-group {{ $errors->has('street_address') ? 'has-error' : ''}}">
	<p>{{ Form::label('street_address', 'Street Address') }}
	{{ Form::text('street_address', null, array('class' => 'form-control', 'placeholder' => 'Street Address')) }}</p>
	</div>
    
    <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
	<p>{{ Form::label('city', 'City') }}
	{{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'City')) }}</p>
	</div>

	<div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
	<p>{{ Form::label('state', 'State') }}
	{{ Form::text('state', null, array('class' => 'form-control', 'placeholder' => 'State')) }}</p>
	</div>

	<div class="form-group {{ $errors->has('zip') ? 'has-error' : ''}}">
	<p>{{ Form::label('zip', 'Zip') }}
	{{ Form::text('zip', null, array('class' => 'form-control', 'placeholder' => 'Zip')) }}</p>
	</div>

	<div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
	<p>{{ Form::label('phone_number', 'Phone Number') }}
	{{ Form::text('phone_number', null, array('class' => 'form-control', 'placeholder' => 'Phone Number')) }}</p>
	</div>

	<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
	<p>{{ Form::label('email', 'Email') }}
	{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}</p>
	</div>

	<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
	<p>{{ Form::label('password', 'Password') }}
	{{ Form::password('password', array('class' => 'form-control')) }}</p>
	</div>	
	
	<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
	<p>{{ Form::label('password_confirmation', 'Confirm Password') }}
	{{ Form::password('password_confirmation', array('class' => 'form-control')) }}</p>
	</div>

	
	@if (!Auth::user())
	<p>{{ Form::submit('Join', array('class' => 'btn btn-lg btn-primary btn-block'))}}</p>

	@else
	<p>{{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary btn-block'))}}</p>

	@endif
	{{ Form::close() }}
	  
</div>

@stop

