@extends('layouts.master-admin')
@section('top-script')
    <style>
        #content{

            margin-left: 50px;
            
        }
        th{
            text-align: center;
        }
        body {
            background-color: #B30B30;
            background-image: url("/assets/images/patterns/pattern-1.png");
        }   
    </style>
@stop
@section('content')

<div class="container-fluid projects">
        <div class="col-md-3"></div>
        <div class="col-md-8">
        <h1 class = "text-center">Users</h1>

            <table class="table table-striped table-hover table-bordered ">
                <tr>
                    <th>
                        First Name
                    </th>
                    <th>
                        Last Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Created At
                    </th>
                    <th>
                        Updated At
                    </th>
                    <th>
                        <a><span class="glyphicon glyphicon-pencil"></span></a>
                    </th>
                    <th>
                        <a><span class="glyphicon glyphicon-trash"></span></a>
                    </th>
                </tr>
<!--                @Foreach ($users as $user)
                <tr>
                    <td>
                        $user->first_name
                    </td>
                    <td>
                        $user->last_name
                    </td>
                    <td>
                        $user->email
                    </td>
                    <td>
                        $user->created_at
                    </td>
                    <td>
                        $user->updated_at
                    </td>
                </tr>
                    End Foreach -->
            </table>

        </div>

    <div class="col-md-2"></div>
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

