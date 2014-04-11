@extends('layouts.master')

@section('top-script')
  <style type="text/css">
    body {
      background-color: #4EA784;
      background-image: url("../assets/images/patterns/pattern-1.png");
    } 
  </style>
@stop
@section('content')
<h3>Reset Your Password?</h3>
<h5>Please enter your email address. We will send you an email with instructions to reset your password.</h5>
<form action="{{ action('RemindersController@postRemind') }}" method="POST">
	<label for ="email">Email</label>
    <input type="email" name="email">
    <input type="submit" value="Send Reminder">
</form>
@stop
