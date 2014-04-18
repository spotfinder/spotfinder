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
				<h1>SpotSpy Confirmation</h1>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<table class="table table-bordered">
				<tr>
                    <th>
                        Area name
                    </th>
                    <th>
                        Lot Name
                    </th>
                    <th>
                        Space Number
                    </th>
                    <th>
                        Street Address
                    </th>
                    <th>
                        Total Cost
                    </th>
                    <th>
                        Arrival
                    </th>
                    <th>
                        Departure
                    </th>
                </tr>
          
                <tr>
                    <td>{{ $order[$index]->area_name }}</td>
                    <td>{{ $order[$index]->lot_name }}</td>
                    <td>{{ $order[$index]->space_number }}</td> 
                    <td>{{ $order[$index]->street_address }}</td> 
                    <td>{{ '$' . number_format($order[$index]->total_cost, 2, '.', ',') }}</td>
                    <td>{{ $order[$index]->arrival }}</td>
                    <td>{{ $order[$index]->departure }}</td>
                    
                </tr>
            </table>
            
            {{ Form::open(array('action' => array('ReservationController@makePayment', $index), 'role'=>'form')) }}
            
			  <script
			    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			    data-key="{{ Config::get('stripe.stripe.public')}}"
			    data-amount="{{ $order[$index]->total_cost * 100 }}"
			    data-name="SpotSpy"
			    data-description="Space {{$order[$index]->space_number}} in {{ $order[$index]->lot_name }} from  {{ $order[$index]->arrival }} to {{ $order[$index]->departure }}"
			    data-image="/assets/images/logo/magnifying-glass.gif">
			  </script>
			
			{{ Form::close() }}
		<div class="col-md-1"></div>
	</div>
@stop