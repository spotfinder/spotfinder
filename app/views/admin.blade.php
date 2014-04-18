@extends('layouts.master-admin')
@section('top-script')
    <style>
        .col-sm-12{
            margin-left: 25px;
            text-align: center;
            width: 90%;
        }
        body {
            background-color: #4EA784;
            background-image: url("/assets/images/patterns/pattern-1.png");
        }   
    </style>
@stop
@section('content')
<div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{ User::totalCount() }}</p>
                    <p class="announcement-text">Existing Users</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View All the Users 
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-road fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{ Lot::totalCount() }}</p>
                    <p class="announcement-text">Existing Lots</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View All the Lots
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-calendar fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{ Reservation::totalCount()}}</p>
                    <p class="announcement-text">Reservations</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Reservations
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-truck fa-5x "></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{ Space::totalCount()}}</p>
                    <p class="announcement-text"> Existing Spaces</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Total Spaces
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->
    </div><!-- /#wrapper -->
<!--Users Table-->
   <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users"></i> Existing Users</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>First Name<i class="fa fa-sort"></i></th>
                        <th>Last Name <i class="fa fa-sort"></i></th>
                        <th>Email <i class="fa fa-sort"></i></th>
                        <th>Created At <i class="fa fa-sort"></i></th>
                        <th>Updated At <i class="fa fa-sort"></i></th>
                        <th>Role Id <i class="fa fa-users"></i></th>
                        <th>Edit <i class="fa fa-pencil-square-o"></i></th>
                        <th>Delete <i class="fa fa-trash-o"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($users as $user)
                        <tr>
                            <td>
                                {{$user->first_name}}
                            </td>
                            <td>
                                {{$user->last_name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{$user->created_at}}
                            </td>
                            <td>
                                {{$user->updated_at}}
                            </td>
                             <td>
                                {{$user->role_id}}
                            </td>
                            <td>
                                <a href = "{{{ action('AdminController@edit', $user->id) }}}" class = "edit_user"><i class="fa fa-pencil-square-o"></i></a>
                            </td>
                            <td>
                                <a href = "{{{ action ('AdminController@destroy', $user->id) }}}" class="delete_user" data-userid="{{{$user->id}}}"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                      @endforeach
                      {{ Form::open(array('action'=> array('AdminController@destroy'), 'method' => 'delete', 'id' => 'formDeleteUser'))}}
                        {{ Form::hidden('type', 'user') }}
                      {{ Form::close() }} 
                    </tbody>
                 </table>
               </div>
            </div>
        </div>
    </div>
</div>

 <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-calendar"></i> Existing Reservations</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>Customer Number <i class="fa fa-sort"></i></th>
                        <th>Reservation Number<i class="fa fa-sort"></i></th>
                        <th>Area Id <i class="fa fa-sort"></i></th>
                        <th>Lot Name <i class="fa fa-sort"></i></th>
                        <th>Space Number <i class="fa fa-sort"></i></th>
                        <th>Duration Time <i class="fa fa fa-clock-o"></i></th>
                        <th>Total Cost <i class="fa fa-money"></i></th>
                        <th>Delete <i class="fa fa-trash-o"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($reservations as $reservation)
                        <tr>
                            <td>
                                {{$reservation->customer_number}}
                            </td>
                            <td>
                                {{$reservation->reservation_number}}
                            </td>
                            <td>
                                {{$reservation->area_id}}
                            </td>
                            <td>
                                {{$reservation->lot_name}}
                            </td>
                            <td>
                                {{$reservation->space_number}}
                            </td>
                             <td>
                                {{$reservation->area_durationTime}}
                            </td>
                            <td>
                                {{$reservation->area_total_cost}}
                            </td>
                            <td>
                                <a href="{{{ action ('AdminController@destroy', $reservation->id) }}}" class="delete_reservation" data-reservationid="{{{$reservation->id}}}"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                      @endforeach
                      {{ Form::open(array('action'=> array('AdminController@destroy'), 'method' => 'delete', 'id' => 'formDeleteReservation'))}}
                        {{ Form::hidden('type', 'reservation') }}
                      {{ Form::close() }} 
                    </tbody>
                 </table>
               </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Lots Table-->
<div class="row">
          <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-road"></i> Add a Lot</h3></div>
                  <div class="panel-body">
                   {{ Form::open(array('action' => 'AdminController@addLot', 'class' => 'form', 'role'=>'form', 'method'=> 'post')) }}
                        <div class="form-group">
                            {{ Form::label('lot_id', 'Lot Id') }}
                            {{ Form::text('lot_id', null, array('class' => 'form', 'placeholder' => 'Lot Id')) }}
                            {{ Form::label('lot_name', 'Lot Name') }}
                            {{ Form::text('lot_name', null, array('class' => 'form', 'placeholder' => 'Lot Name')) }}
                            {{ Form::label('area_id', 'Area Id') }}
                            {{ Form::text('area_id', null, array('class' => 'form', 'placeholder' => 'Area Id')) }}
                         </div>
                        <div class="form-group">
                            {{ Form::label('area_name', 'Area Name') }}
                            {{ Form::text('area_name', null, array('class' => 'form', 'placeholder' => 'Area Name')) }}
                            {{ Form::label('street_address', 'Street Address') }}
                            {{ Form::text('street_address', null, array('class' => 'form', 'placeholder' => 'Street Address')) }}
                            {{ Form::label('city', 'City') }}
                            {{ Form::text('city', null, array('class' => 'form', 'placeholder' => 'City')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('state', 'State') }}
                            {{ Form::text('state', null, array('class' => 'form', 'placeholder' => 'State')) }}
                            {{ Form::label('zip', 'Zip') }}
                            {{ Form::text('zip', null, array('class' => 'form', 'placeholder' => 'Zip')) }}
                            {{ Form::label('phone_number', 'Phone Number') }}
                            {{ Form::text('phone_number', null, array('class' => 'form', 'placeholder' => '##########')) }}
                        </div>
                        <div class="form-group"> 
                            {{ Form::label('capacity', 'Capacity') }}
                            {{ Form::text('capacity', null, array('class' => 'form', 'placeholder' => 'Capacity')) }}
                            {{ Form::label('open_time', 'OpenTime') }}
                            <input type="time" name="open_time" id ="open_time">
                            {{ Form::label('close_time', 'Close Time') }}
                            <input type="time" name="close_time" id ="close_time">
                        </div>
                        <div class="form-group"> 
                            {{ Form::label('latitude', 'Latitude') }}
                            {{ Form::text('latitude', null, array('class' => 'form', 'placeholder' => 'Latitude')) }}
                            {{ Form::label('longitude', 'Longitude') }}
                            {{ Form::text('longitude', null, array('class' => 'form', 'placeholder' => 'Longitude')) }}
                            {{ Form::label('cost_per_hour', 'Cost Per Hour') }}
                            {{ Form::text('cost_per_hour', null, array('class' => 'form', 'placeholder' => 'Cost Per Hour')) }}
                        </div>
                        <input type="submit" value="Add Lot" class="btn btn-primary">
                    {{ Form::close() }}
                  </div>
            </div>
        </div>
    </div>

@stop


@section('bottom-script')
    <!-- Custom JavaScript for the Menu Toggle -->
    <script>
    $('.delete_user').on('click', function(e){
        e.preventDefault();
        if(confirm("Are you sure you want to delete this user?")){
          $('#formDeleteUser').attr('action', '/admin/' + $(this).data('userid'));
          $('#formDeleteUser').submit();   
        }
    });

    $('.delete_reservation').on('click', function(e){
        e.preventDefault();
        if(confirm("Are you sure you want to delete this reservation?")){
         $('#formDeleteReservation').attr('action', '/admin/' + $(this).data('reservationid'));
         $('#formDeleteReservation').submit();   
        }
    })
    </script>
@stop


