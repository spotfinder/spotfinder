@extends('layouts.master-view')
	<style>
		div #error{
         	margin: center;
         	height: 90%;
         	width: 90%;
		}
	</style>
@section('content')
  <div>
    <img id="error" src = "/img/error.png">
  </div>
    <div class = "text-center"><a href = "{{{ action('HomeController@showHome') }}}" > Go Home</a></div>
@stop