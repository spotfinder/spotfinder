@extends('layouts.master-view')

@section('top-script')
<style>
    body {
        background-color: #4EA784;
        background-image: url("/assets/images/patterns/pattern-1.png");
        margin-top: 100px;
    } 
    td, h3 {
        text-align: center;
    }
    #backButton {
        color: #000;
        text-align: center;
        margin: auto;
    }
</style>
@stop

@section('content')

    <h1 style="text-align:center">Available Parking</h1>
    <h3> This page will time out in 5 minutes. </h3>
  
    <div class="container-fluid projects">

        <div class="col-md-2"></div>

        <div class="col-md-8">
        {{ Form::open(array('action' => 'HomeController@showConfirmation', 'method' => "GET")) }}
            <table class="table table-striped table-hover table-bordered">
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
                        Total Cost ($)
                    </th>
                    <th>
                        Select
                    </th>
                </tr>

                @foreach($results as $key => $result)
                <tr>
                    <td>{{ $result->area_name }}</td>
                    <td>{{ $result->lot_name }}</td>
                    <td>{{ $result->space_number }}</td> 
                    <td>{{ number_format($result->total_cost, 2, '.', ',') }}</td>

                    <td>
                        <input type="radio" name="pick_me" class="pick_me" value="{{$key}}" data-amount="{{{ $result->total_cost * 100 }}}" data-space="{{{ $result->space_number }}}" data-lot="{{{ $result->lot_name }}}" data-duration="{{{ $result->duration }}}">&nbsp;Pick Me</input>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ Form::submit('Go to payment', array('class' => 'btn btn-lg btn-primary paymentButton'))}}
            {{ Form:: close() }}
            
            <div id='backButton'>
                <a href="{{{ action('HomeController@showReservation') }}}"><button class="btn btn-primary">Back to Search</button></a>
            </div>
            </div>
        <div class="col-md-2"></div>
        </div>
    </div>
@stop

@section('bottom-script')
    <script>
        /*var handler = StripeCheckout.configure({
            key: '{{ Config::get('stripe.stripe.public')}}',
            image: 'assets/images/logo/logo.png',
            name: 'SpotFinder'
        });*/
        
        selectionTime = setTimeout(startSelection, 300000);
        //
        function startSelection(){
            setTimeout(stopSelection, 300000);
            $('#backButton').hide();
        }

        // function to stop / reset the timer
        function stopSelection() {
            clearTimeout(selectionTime);
            $('.paymentButton').hide();
            $('table').hide(); 
            $('h3').show();
            $('#backButton').show(); 
        }

        //

        $('.paymentButton').hide();
        $('.pick_me').on('click', function(){
            $('.paymentButton').show();
        });

        $("#showStripe").on('click', function() {
            handler.open({

                description: 'Space ' + $("#spaceInput").val() + ' in the ' + $("#lotInput").val() + ' lot for ' + $("#durationInput").val() + ' hrs',
                amount: $("#amountInput").val()
            });
            e.preventDefault();
        });
        
    </script>
@stop