@extends('layouts.master-admin')
@section('top-script')
    <style>
        .col-sm-12{
            text-align: center;
            width: 100%;
        }
        body {
            background-color: #4EA784;
            background-image: url("/assets/images/patterns/pattern-1.png");
        }   
    </style>
@stop

@section('content')
<!-- Create New User Form-->
<div class="row">
          <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-user"></i> Add a User</h3></div>
                  <div class="panel-body">
                   {{ Form::open(array('action' => 'AdminController@store', 'class' => 'form', 'role'=>'form', 'method'=> 'post')) }}
                        <div class="form-group">
                            <label>Customer Number</label>
                            <input type="number" name="customer_number" id="customer_number" required>
                            <label>First Name</label>
                            <input type="text" name="first_name" id ="first_name" required>
                            <label>Last Name</label>
                            <input type="text" name="last_name" id ="last_name" required>
                         </div>
                        <div class="form-group">
                            <label>Street Address</label>
                            <input type="text" name="street_address" id='street_address' required>
                            <label>City</label>
                            <input type="text" name="city" id="city" required>
                            <label>State</label>
                            <input type="text" name="state" id="state" required>
                        </div>
                        <div class="form-group">
                            <label>Zip</label>
                            <input type="number" name="zip" id="state" required>
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" required>
                            <label>Email</label>
                            <input type="text" name="email" id="email" required>
                         </div>
                        <div class="form-group"> 
                            <label>Password</label>
                            <input type="password" name="password" id="password" required>
                            <label>Role Id</label>
                            <input type="number" name="role_id" id="role_id" required>
                        </div>
                        <input type="submit" value="Add User" class="btn btn-primary">
                    {{ Form::close() }}
                  </div>
            </div>
        </div>
    </div>
 @stop
