@extends('layouts.master-view')
	<style>
		div #error{
         	margin-left: 40px;
         	height: 500px;
         	width: 1060px;
		}
	</style>
@section('content')
  <div>
    <img id="error" src = "/img/error.png">
  </div>
    <div class = "text-center"><a href = "{{{ action('HomeController@showHome') }}}" > Go Home</a></div>
@stop