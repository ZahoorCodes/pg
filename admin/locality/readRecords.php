<?php
	// include Database connection file
	include("db_connection.php");

	// Design initial table header
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Locality</th>
							<th>District</th>
							
							<th>Delete</th>
						</tr>';
	$query = "SELECT tbl_locality.*,tbl_district.name AS District From tbl_locality INNER JOIN tbl_district ON tbl_locality.district_id=tbl_district.id";
	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
    // if query results contains rows then featch those rows
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
				
				<td>'.$row['name'].'</td>
				
				<td>'.$row['District'].'</td>
				
				<td>
					<button onclick="DeleteLocality('.$row['id'].')" class="btn btn-danger">Delete</button>
				</td>
					
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }
    $data .= '</table>';
    echo $data;
?>
