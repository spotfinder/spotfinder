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
    </style>
@stop
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="page-header col-md-10">
				<h1>Payment Confirmation</h1>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<table class="table table-striped table-hover table-bordered">

               	<?= 
               	// $results = Session::get('results'); 
var_dump(Session::get('results'));
die;
               	?>

                @foreach($results as $key => $result)
             
                <tr>
                    <td>{{ $result->area_name }}</td>
                    <td>{{ $result->lot_name }}</td>
                    <td>{{ $result->space_number }}</td> 
                    <td>{{ number_format($result->total_cost, 2, '.', ',') }}</td>
                    <td><input type="radio" name="pick_me" class="pick_me" data-amount="{{{ $result->total_cost * 100 }}}" data-space="{{{ $result->space_number }}}" data-lot="{{{ $result->lot_name }}}" data-duration="{{{ $result->duration }}}">&nbsp;Pick Me</button></td>
                </tr>

                @endforeach

            </table>
			<div class="col-md-4"></div>
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
			@endif
		
		<div class="col-md-1"></div>
	</div>
@stop