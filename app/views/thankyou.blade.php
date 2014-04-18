<html>
<head>
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
    <style>
  
		body {
		    margin-top: 50px;
			text-align: center;
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
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="page-header col-md-10">
				<h1>Thank you!</h1>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">

		<div>
            <a href="{{{ action('HomeController@showReservation') }}}"><button class="btn btn-primary">Reserve Another Spot</button></a>
        </div>

 
        <p><h3>Thank you for reserving a spot with us. Here are the details of your reservation:</h3></p>
       
        	<div class= "text-center">
	            <h5>Date: {{ $reservation->arrival_date_time}}</h5>
	            <h5>Lot Name: {{ $reservation->lot_name}}</h5>
	            <h5>Space Number: {{ $reservation->space_number}}</h5>
	            <h5>Address: {{ $reservation->street_address}} </h5>
	            <h5>Cost: {{ $reservation->total_cost}}</h5>
            </div>
               	
			<div class="col-md-4"></div>
			<div class="col-md-4">
				  	<h5>Get details about your <em> reservation on your phone</em>? <br>Enter your phone number below.</h5>
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
		
		<div class="col-md-1"></div>
	</div>
</body>
</html>