@extends('layouts.master')

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


	<p>{{ Form::label('first_name', 'First Name') }}
	{{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name')) }}</p>

	<p>{{ Form::label('last_name', 'Last Name') }}
	{{ Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}</p>

	<p>{{ Form::label('email', 'Email') }}
	{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}</p>

	<p>{{ Form::label('password', 'Password') }}
	{{ Form::password('password', array('class' => 'form-control')) }}	
	
	<p>{{ Form::label('password_confirmation', 'Confirm Password') }}
	{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
	
	@if (!Auth::user())
	<p>{{ Form::submit('Join', array('class' => 'btn btn-lg btn-primary btn-block'))}}</p>

	@else
	<p>{{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary btn-block'))}}</p>

	@endif
	{{ Form::close() }}
	  
</div>

@stop

