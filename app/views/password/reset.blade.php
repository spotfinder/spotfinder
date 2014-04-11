@extends('layouts.master')

@section('top-script')
  <style type="text/css">
    body {
      background-color: #4EA784;
      background-image: url("/assets/images/patterns/pattern-1.png");
    } 
  </style>
@stop

@section('content')
<form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
    <p><label for ="email">Email</label>
    <input type="email" name="email"></p>
    <p><label for ="password">Password</label>
    <input type="password" name="password"></p>
    <p><label for ="password_confirmation">Password Confirmation</label>
    <input type="password" name="password_confirmation"></p>

    <input type="submit" value="Reset Password">
</form>
@stop