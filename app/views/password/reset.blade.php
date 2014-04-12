@extends('layouts.master-view')


@section('top-script')
	<style type="text/css">
		body {
			background-color: #4EA784;
			background-image: url("/assets/images/patterns/pattern-1.png");
		} 

		#container_form{
			margin-top: 100px;
		}
		 #reset_form{
			margin-left: 450px;
		}

	</style>
@stop

@section('content')
<div id ="container_form">
<h3 class="text-center">Enter the new password:</h3>
	<form  id ="reset_form" action="{{ action('RemindersController@postReset') }}" method="POST">
			<input type="hidden" name="token" value="{{ $token }}">

		 <div class="form-group">
				<label for ="email" class="col-sm-2">Email</label>
		 	<div class = "col-sm-10">
		    	<p><input type="email" name="email" required></p>
			</div>
		 </div>

		 <div class="form-group">
	 		<label for ="password" class="col-sm-2">New Password</label>
		 	<div class = "col-sm-10">
				<p><input type="password" name="password" required></p>
			</div>
		</div>

		 <div class="form-group">
			<label for ="password_confirmation" class = "col-sm-2">Password Confirmation</label>
		 	<div class = "col-sm-10">
			     <p><input type="password" name="password_confirmation" required></p>
		    </div>
		</div>

		 <div class="form-group">
		 	<div class = "col-sm-10">
			     <input type="submit" value="Reset Password" class= "btn btn-sm btn-primary">
			</div>
		</div>
	</form>
</div>
@stop