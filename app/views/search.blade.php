@extends('layouts.master-view')

@section('top-script')
<style>
    body {
    background-color: #4EA784;
    background-image: url("/assets/images/patterns/pattern-1.png");
    margin-top: 80px;
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
                        Total Cost
                    </th>
                    <th>
                        Select
                    </th>
                </tr>

                @foreach($this->$results as $result)
             
                <tr>
                    <td>{{ $result->area_name }}</td>
                    <td>{{ $result->lot_name }}</td>
                    <td>{{ $result->space_number }}</td> 
                </tr>
                @endforeach
            </table>
            <div>
                {{ Form::open(array('action' => 'HomeController@doPay', 'method' => 'post')) }}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{ Config::get('stripe.stripe.public')}}"
                    data-amount="1000"
                    data-name="SpotFinder"
                    data-description="1 spot in LAZ for 12 hours ($10.00)"
                    data-image="assets/images/logo/logo.png">
                    </script>
                {{Form::close()}}
            </div>
        <div class="col-md-2"></div>
        </div>
    </div>
@stop