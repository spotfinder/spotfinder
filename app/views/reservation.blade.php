@extends('layouts.master-view')

@section('top-script')
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
		{{ Form::open(array('action' => 'ReservationController@solution', 'class' => 'form-signin', 'role'=>'form')) }}
	    	<p>{{ Form::label('area', 'Area') }}
	    	   <select class="form-control">
					<option value="1">Downtown</option>
					<option value="2">Central Park</option>
				</select> </p>
	        <p>{{ Form::label('arrival_date', 'Arrival Date & Time') }}
               <input type="datetime-local" class="form-control" id="arrival_date_time" placeholder=""></p>
            <p>{{ Form::label('departure_date', 'Departure Date & Time') }}
               <input type="datetime-local" class="form-control" id="departure_date_time" placeholder=""></p>
			<p>{{ Form::label('remember_me', 'Remember me!') }}
			   {{ Form::checkbox('remember_me', 'value', true)}}<p>
	        <p>{{ Form::submit('Submit', array('class' => 'btn btn-lg btn-primary btn-block')) }}</p>
	    {{ Form::close() }}			
</div> 

@stop