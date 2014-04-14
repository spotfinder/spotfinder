@extends('layouts.master-admin')
@section('top-script')
    <style>
        #content{

            margin-left: 50px;
            
        }
        .col-sm-12{
            margin-left: 90px;
            text-align: center;
            width: 900px;
        }
        body {
            background-color: #FFF;
            background-image: url("/assets/images/patterns/pattern-1.png");
        }   
    </style>
@stop
@section('content')

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
                                <i class="fa fa-pencil-square-o"></i>
                            </td>
                            <td>
                                <i class="fa fa-trash-o"></i> 
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

@stop

@section('bottom-script')
    <!-- Custom JavaScript for the Menu Toggle -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
    </script>
@stop

