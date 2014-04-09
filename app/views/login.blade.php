@extends('layouts.master')

@section('top-script')
<link href="/css/signin.css" rel="stylesheet">
<style>
	#formlogin {
		margin-top: 60px;
	
	}
    h2{
    	text-align: center;
    }
	body {
		background-color: #4EA784;
		background-image: url("/assets/images/patterns/pattern-1.png");
	}

	a{
		color: #045BA5;
	}
</style>
@stop

@section('content')

       <div id="formlogin">
       {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'form-signin', 'role'=>'form')) }}
	        <h2 class="form-signin-heading">Sign in</h2>
	        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			    <p>{{ Form::label('email', 'Email') }}
			       {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}</p>
		    </div>
		    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
			    <p>{{ Form::label('password', 'Password') }}
		           {{ Form::password('password', array('class' => 'form-control')) }}</p>
	        </div>
	        <p>{{ Form::label('remember_me', 'Remember me!') }}
	           {{ Form::checkbox('remember_me', 'value', true)}}</p>
	        <p>{{ Form::submit('Sign In', array('class' => 'btn btn-lg btn-primary btn-block'))}}<p>
      {{ Form::close() }}

           <div class = "text-center"> 
      @if (!Auth::user())
	           <h4> Not an existing user?</h4>
	            <a href = "{{{ action('RegisterController@index') }}}"> Sign Up!</a>
      @else  
                <h4> Welcome Back!</h4>
                <a href = "{{{ action('RegisterController@index') }}}"> Edit Account</a>
      @endif          
	       </div>
       </div>

@stop