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
                    <td><input type="radio" name="pick_me" class="pick_me" data-amount="{{{ $result->total_cost * 100 }}}" data-space="{{{ $result->space_number }}}" data-lot="{{{ $result->lot_name }}}" data-duration="{{{ $result->duration }}}">&nbsp;Pick Me</button></td>
                </tr>
                @endforeach
            </table>
            <?php
                $amount = ($results[$key]->total_cost)*100;
                
                $space = $results[$key]->space_number;
                $duration = $results[$key]->duration;

            ?>
            <div id="paymentButton">
                <button class="btn btn-primary" id="showStripe">Pay Now</button>
                {{ Form::open(array('action' => 'HomeController@doPay', 'method' => 'post')) }}
                    <input type="hidden" name="amount" id="amountInput" value="">
                    <input type="hidden" name="space" id="spaceInput" value="">
                    <input type="hidden" name="lot" id="lotInput" value="">
                    <input type="hidden" name="duration" id="durationInput" value="">

                    <script src="https://checkout.stripe.com/checkout.js" ></script>
                    
                {{Form::close()}}
            </div>
            <div id='backButton'>
                <a href="{{{ action('HomeController@showReservation') }}}"><button class="btn btn-primary">Back to Search</button></a>
            </div>
        <div class="col-md-2"></div>
        </div>
    </div>
@stop

@section('bottom-script')
    <script>
        var handler = StripeCheckout.configure({
            key: '{{ Config::get('stripe.stripe.public')}}',
            image: 'assets/images/logo/logo.png',
            name: 'SpotFinder'
        });
        
        selectionTime = setTimeout(startSelection, 300000);
        //
        function startSelection(){
            setTimeout(stopSelection, 300000);
            $('#backButton').hide();
        }

        // function to stop / reset the timer
        function stopSelection() {
            clearTimeout(selectionTime);
            $('button').hide();
            $('table').hide(); 
            $('h3').show(); 
        }

        //

        $('#paymentButton').hide();
        $('.pick_me').on('click', function(){
            $("#amountInput").val($(this).data('amount'));
            $("#spaceInput").val($(this).data('space'));
            $("#lotInput").val($(this).data('lot'));
            $("#durationInput").val($(this).data('duration'));
            $('#paymentButton').show();
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