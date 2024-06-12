<?php
	// include Database connection file
	include("db_connection.php");

	// Design initial table header
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>District</th>
							<th>Region</th>
							
							<th>Delete</th>
							
						</tr>';
	$query = "SELECT tbl_district.*,tbl_region.name AS Region From tbl_district INNER JOIN tbl_region ON tbl_district.region_id=tbl_region.id";
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
				<td>'.$row['Region'].'</td>
				
				<td>
					<button onclick="DeleteDist('.$row['id'].')" class="btn btn-danger">Delete</button>
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
