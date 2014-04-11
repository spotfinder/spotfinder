@extends('layouts.master-view')

@section('top-script')
  <style type="text/css">
    body {
      background-color: #4EA784;
      background-image: url("/assets/images/patterns/pattern-1.png");
    } 
  </style>
@stop
@section('content')
<div class="page-header">
    <h1>Search Result:</h1>
  </div>

  <div class="container-fluid projects">

    <div class="col-md-2"></div>

    <div class="col-md-8">

      <table class="table table-striped table-hover table-bordered ">
        <tr>
          <th>
            Area
          </th>
          <th>
            Lot Name
          </th>
          <th>
            Spot Number
          </th>
          <th>
            Cost
          </th>
        </tr>
      </table>
    </div>

    <div class="col-md-2"></div>
  </div>
</div>
@stop