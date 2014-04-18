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
            @if (empty($user->id))
                <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-user"></i> Add a User</h3></div>
                  <div class="panel-body">
                   {{ Form::open(array('action' => 'AdminController@store', 'class' => 'form', 'role'=>'form', 'method'=> 'post')) }}
            @else
                <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-user"></i> Edit a User</h3></div>
                  <div class="panel-body">
                   {{ Form::model($user, array('action' => array('AdminController@update', $user->id), 'method' => 'put', 'class' => 'form', )) }}
            @endif
                        <div class="form-group">
                            {{ Form::label('first_name', 'First Name') }}
                            {{ Form::text('first_name', null, array('class' => 'form', 'placeholder' => 'First Name')) }}
                            {{ Form::label('last_name', 'Last Name') }}
                            {{ Form::text('last_name', null, array('class' => 'form', 'placeholder' => 'Last Name')) }}
                            {{ Form::label('street_address', 'Street Address') }}
                            {{ Form::text('street_address', null, array('class' => 'form', 'placeholder' => 'Street Address')) }}
                         </div>
                        <div class="form-group">
                            {{ Form::label('city', 'City') }}
                            {{ Form::text('city', null, array('class' => 'form', 'placeholder' => 'City')) }}
                            {{ Form::label('state', 'State') }}
                            {{ Form::text('state', null, array('class' => 'form', 'placeholder' => 'State')) }}
                            {{ Form::label('zip', 'Zip') }}
                            {{ Form::text('zip', null, array('class' => 'form', 'placeholder' => 'Zip')) }}
                        </div>
                        <div class="form-group">
                            <span "{{ $errors->has('phone_number') ? 'has-error' : ''}}">
                            {{ Form::label('phone_number', 'Phone Number') }}
                            {{ Form::text('phone_number', null, array('class' => 'form', 'placeholder' => 'Phone Number')) }}
                             </span>
                             <span "{{ $errors->has('email') ? 'has-error' : ''}}">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::text('email', null, array('class' => 'form', 'placeholder' => 'Email')) }}
                             </span>
                            <span "{{ $errors->has('password') ? 'has-error' : ''}}">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password', null, array('class' => 'form', 'placeholder' => 'Password')) }}
                            </span>
                        </div>
                        <div class="form-group" > 
                            <span "{{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                            {{ Form::label('password_confirmation', 'Confirm Password') }}
                            {{ Form::password('password_confirmation', array('class' => 'form')) }}
                            </span>
                            {{ Form::label('role_id', 'Role Id') }}
                            {{ Form::text('role_id', null, array('class' => 'form', 'placeholder' => 'Role Id')) }}
                        </div>
            @if (empty($user->id))
                        <input type="submit" value="Add User" class="btn btn-primary">
            @else
                         <input type="submit" value="Save User" class="btn btn-primary">
            @endif
                    {{ Form::close() }}
                  </div>
            </div>
        </div>
    </div>
 @stop
