@extends('layouts.master-view')
@section('top-script')
    <style>
		body {
		    margin-top: 50px;
			text-align: center;
			/*background-image: url("/assets/pattern-1.png");*/
			/*background-size: 100%;*/
			background-image: url("/assets/images/patterns/pattern-1.png");
			background-color: #4EA784;
		}
		h1{
			color: #000;
		}

		h5{
			color: #000;
		}
		th {
			text-align: center;
		}
		table {
			background-color: #FFF;
		}
    </style>
@stop
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="page-header col-md-10">
				<h1>Thank you</h1>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">

		<div>
            <a href="{{{ action('HomeController@showReservation') }}}"><button class="btn btn-primary">Reserve Another Spot</button></a>
        </div>
               	
			<!-- <div class="col-md-4"></div>
			<div class="col-md-4">
				  	<h5>Do you want to get details about your <em> reservation</em>? <br>Enter your phone number below.</h5>
				    {{ Form::open(array('action' => 'HomeController@sendConfirmation', 'class' => 'well', 'role'=>'form', 'method'=> 'post')) }}
				  <div class="form-group text-center">
				    <h5><label for="phone">Phone Number:</label></h5>
				    <input type='text' class="form-control" id="phone" name="phone" placeholder="##########" style="text-align:center" required>
				  </div>
				  <button type="submit" class="btn btn-default">Send</button>
				 {{ Form::close() }}
			</div>
			<div class="col-md-4"></div>
		</div>
		<div class="col-md-1"></div>
		
			@if (Session::has('phone'))
				<div class="alert alert-info" >
					<p>Message to {{ Session::get('phone') }} sent</p>
				</div>
			@endif -->
		
		<div class="col-md-1"></div>
	</div>
@stop