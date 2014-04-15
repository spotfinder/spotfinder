@extends('layouts.master-view')

@section('top-script')
<style>
    body {
        background-color: #4EA784;
        background-image: url("/assets/images/patterns/pattern-1.png");
        margin-top: 100px;
    } 
    td {
        text-align: center;
    }
    a {
        color: #FFF;
    }
</style>
@stop

@section('content')
    <h1 style="text-align:center">Available Parking</h1>

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
                    <td>{{ $result->total_cost }}</td>
                    <td><a href="#?purchase=<?= $key; ?>"><input type="checkbox" name="pick_me" id="pick_me" value="$key">&nbsp;Pick Me</button></a></td>
                </tr>
                @endforeach
            </table>
            <?php
                $amount = ($results[$key]->total_cost)*100;
               
                $space = $results[$key]->space_number;
                $duration = $results[$key]->duration;

                // Session::put()

            ?>
            <div id="paymentButton">
                {{ Form::open(array('action' => 'HomeController@doPay', 'method' => 'post')) }}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="amount" value={{ $amount }}>
                    <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{ Config::get('stripe.stripe.public')}}"
                    data-amount={{ $amount }}
                    data-name="SpotFinder"
                    data-description="Spot {{ $results[$key]->space_number}} in {{ $results[$key]->lot_name; }} for {{ $duration }} hours"
                    data-image="assets/images/logo/logo.png">
                    </script>
                {{Form::close()}}
            </div>
        <div class="col-md-2"></div>
        </div>
    </div>
@stop

@section('bottom-script')
    <script>
        $('#paymentButton').hide();
        $('#pick_me').on('click', function(){
            $('#paymentButton').show();
        })
    </script>
@stop