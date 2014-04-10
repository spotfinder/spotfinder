@extends('layouts.master')
@section('content')
	 <h1>Available Spaces: Date and Time</h1>
      <div class="table-responsive">
      	<hr>
          <table class="table">
            <thead>
            	<tr>
                <th>Area</th>
                <th>
                  	<a href="?sort_column=name&amp;sort_order=ASC"><i class="fa fa-arrow-up"></i></a>
                    <a href="?sort_column=name&amp;sort_order=DESC"><i class="fa fa-arrow-down"></i></a>
                </th>
                <th>Lot Name<a href="?sort_column=location&amp;sort_order=ASC"><i class="fa fa-arrow-up"></i></a>
                	          <a href="?sort_column=location&amp;sort_order=DESC"><i class="fa fa-arrow-down"></i></a>
                </th>
                <th>Spot Number</th>
                <th>Cost
                	   <a href="?sort_column=date_established&amp;sort_order=ASC"><i class="fa fa-arrow-up"></i></a>
                     <a href="?sort_column=date_established&amp;sort_order=DESC"><i class="fa fa-arrow-down"></i></a>
                </th>
              </tr>
            </thead> 
            <tbody>
                
                   @while ($row = $result->fetch_assoc()) 
                       echo "<tr>";
                       echo "   <td>".$row['area_name']."</td>";
                       echo "   <td>".$row['lot_name']."</td>";
                       echo "   <td>".$row['space_number']."</td>";
                       echo "   <td>".$row['cost']."</td>";
                       echo "</tr>";

                   @endwhile
            </tbody>
          </table>
    </div><!-- /.table-responsive -->
@stop