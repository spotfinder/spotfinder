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
	    	<!-- <p>{{ Form::label('first_name', 'First Name') }}
	    	   {{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name')) }}</p>
		    <p>{{ Form::label('last_name', 'Last Name') }}
	           {{ Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}</p> -->
	        <p>{{ Form::label('arrival_date', 'Arrival Date') }}
               <input type="date" class="form-control" id="inputDate" placeholder=""></p>
            <p>{{ Form::label('start_time', 'Start Time') }}
               <input type="time" class="form-control" id="inputStartTime" placeholder=""></p>
            <p>{{ Form::label('end_time', 'End Time') }}
               <input type="time" class="form-control" id="inputEndTime" placeholder=""></p>		
			<!-- <p>{{ Form::label('arrival_date', 'Arrival Date') }}		
			   {{ Form::selectMonth('month', null, [])}}
			   {{ Form::selectYear('year', 2014, 2020, null, []) }}</p> -->
			<p>{{ Form::label('remember_me', 'Remember me!') }}
			   {{ Form::checkbox('remember_me', 'value', true)}}<p>
	        <p>{{ Form::submit('Submit', array('class' => 'btn btn-lg btn-primary btn-block')) }}</p>
	    {{ Form::close() }}			
</div> 

@stop