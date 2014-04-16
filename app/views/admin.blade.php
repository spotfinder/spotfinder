@extends('layouts.master-admin')
@section('top-script')
    <style>
        #content{

            margin-left: 50px;
            
        }
        .col-sm-12{
            margin-left: 90px;
            text-align: center;
            width: 1200px;
        }
        body {
            background-color: #FFF;
            background-image: url("/assets/images/patterns/pattern-1.png");
        }   
    </style>
@stop
@section('content')
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
                                <i class="fa fa-pencil-square-o"></i>
                            </td>
                            <td>
                                <a href = "#" class = "delete_user"><i class="fa fa-trash-o"></i></a>
                                {{ Form::open(array('action'=> array('AdminController@destroy', $user->id), 'method' => 'delete', 'id' => 'formDeleteUser'))}}
                                {{ Form::close() }} 
                            </td>
                        </tr>
                       @endforeach
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
                            <label>Lot Id</label>
                            <input type="number" name="lot_id" id='lot_id'>
                            <label>Lot Name</label>
                            <input type="text" name="lot_name" id ='lot_name'>
                            <label>Area Id</label>
                            <input type="number" name="area_id" id ='area_id'>
                         </div>
                        <div class="form-group">
                            <label>Area Name</label>
                            <input type="text" name="area_name" id='area_name'>
                            <label>Street Address</label>
                            <input type="text" name="street_address" id="street_address">
                            <label>City</label>
                            <input type="text" name="city" id="city">
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" id="state">
                            <label>Zip</label>
                            <input type="text" name="zip" id="zip">
                            <label>Phone Number</label>
                            <input type="tel" name="phone_number" id="phone_number">
                         </div>
                        <div class="form-group"> 
                            <label>Capacity</label>
                            <input type="number" name="capacity" id="capacity">
                            <label>Open Time</label>
                            <input type="time" name="open_time" id="open_time">
                            <label>Close Time</label>
                            <input type="time" name="close_time" id="close_time">
                        </div>
                        <div class="form-group"> 
                            <label>Latitude</label>
                            <input type="float" name="latitude" id="latitude">
                            <label>Longitude</label>
                            <input type="float" name="longitude" id="longitude">
                            <label>Cost Per Hour</label>
                            <input type="number"  min="0.01" step="0.01" name="cost_per_hour" id="cost_per_hour">
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
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });

    $('.delete_user').on('click', function(e){
        e.preventDefault();
        if(confirm("Are you sure you want to delete this user?")){
         $('#formDeleteUser').submit();   
        }
    });
    </script>
@stop

