@extends('layouts.master')

@section('top-script')
<link href="/css/signin.css" rel="stylesheet">
<style>
	#formreserve {
		margin-top: 100px;
	
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
<div id = "formreserve">
		<h2>Reserve Now</h2> 
		{{ Form::open(array('action' => 'HomeController@showReservation', 'class' => 'form-signin', 'role'=>'form')) }}
	    	<p>{{ Form::label('location', 'Location') }}
	    	   <select class="form-control">
					<option>Downtown</option>
					<option>Central Park</option>
				</select> </p>
	        <p>{{ Form::label('arrival_date', 'Arrival Date') }}
               <input type="date" class="form-control" id="arrival_date" placeholder=""></p>
            <p>{{ Form::label('start_time', 'Start Time') }}
               <input type="time" class="form-control" id="start_time" placeholder=""></p>
            <p>{{ Form::label('departure_date', 'Departure Date') }}
               <input type="date" class="form-control" id="departure_date" placeholder=""></p>
            <p>{{ Form::label('end_time', 'End Time') }}
               <input type="time" class="form-control" id="end_time" placeholder=""></p>	
			<p>{{ Form::label('remember_me', 'Remember me!') }}
			   {{ Form::checkbox('remember_me', 'value', true)}}<p>
	        <p>{{ Form::submit('Submit', array('class' => 'btn btn-lg btn-primary btn-block')) }}</p>
	    {{ Form::close() }}			
</div> 

@stop