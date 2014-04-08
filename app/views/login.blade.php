<!DOCTYPE html>
<html>
<head>
	  <!-- Bootstrap -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	  <!--CSS for sign in form-->
		<link href="/css/signin.css" rel="stylesheet">
</head>
<body>
       <div id="formlogin">
       {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'form-signin', 'role'=>'form')) }}
	        <h2 class="form-signin-heading">Sign in</h2>
		    {{ Form::label('email', 'Email') }}
		    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
		    {{ Form::label('password', 'Password') }}
	        {{ Form::password('password', array('class' => 'form-control')) }}
	        <label class="checkbox">
	          <input type="checkbox" value="remember-me" checked> Remember me
	        </label>
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      {{ Form::close() }}
           <div class = "text-center"> 
	           <h4> Not an existing user?</h4>
	            <a href = "{{{ action('RegisterController@index') }}}"> Sign Up!</a>
	       </div>
       </div>
</body>
</html>