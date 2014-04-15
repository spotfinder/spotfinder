@extends('layouts.master-view')

@section('top-script')
	<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
	<style>
		.form-styleReservation {
	  max-width: 330px;
	  padding: 15px;
	  margin: 0 auto;
	  margin-bottom: 10px;
	  font-weight: normal;
	  position: relative;
	  height: auto;
	  -webkit-box-sizing: border-box;
	     -moz-box-sizing: border-box;
	          box-sizing: border-box;
	  padding: 10px;
	  font-size: 16px;
	  z-index: 2;
	}

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
<div class="form-styleReservation" id = "formreserve">
		<h2>Reserve Now</h2> 
		{{ Form::open(array('action' => 'ReservationController@solution', 'role'=>'form')) }}
	    	<p>{{ Form::label('area', 'Area') }}
	    	   <select name='area' id='area' class="form-control">
					<option value="1">Downtown</option>
					<option value="2">Medical Center</option>
					<option value="3">Alamodome</option>
					<option value="4">AT&amp;T Center</option>
				</select> </p>
			 <div class="form-group">
	            	<label for="start_date">Choose: Arrival Date &amp; Time </label>
	                <div class='input-group date' id='datetimepicker1'>
	                    <input type='text' class="form-control" name='arrival_date_time' id="arrival_date_time">
	                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	                </div>
            </div>
             <div class="form-group">
	            	<label for="start_date">Choose: Arrival Date &amp; Time </label>
	                <div class='input-group date' id='datetimepicker2'>
	                    <input type='text' class="form-control" name='departure_date_time' id="departure_date_time">
	                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	                </div>
            </div>
            <p>{{ Form::label('license_plate_number', 'License Plate Number') }}
            	<input type="text" class="form-control" name="license_plate_number" id="license_plate_number" placeholder="" required></p>
            	<br>
           
		   
		    
	        <p>{{ Form::submit('Submit', array('class' => 'btn btn-lg btn-primary btn-block')) }}</p>
	    {{ Form::close() }}			
</div> 
@stop

@section('bottom-script')
<!-- Bower Components--> 
<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<script>
	$(function () {
		$('#datetimepicker1').datetimepicker();
	});
	$(function () {
		$('#datetimepicker2').datetimepicker();
	});
</script>
@stop

