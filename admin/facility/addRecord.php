<?php
	if(isset($_POST['facility_name'])){
		include("db_connection.php");
		$facility_name = $_POST['facility_name'];
		$query = "INSERT INTO tbl_facilite(facility_name) VALUES('$facility_name')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "Facility Added Successfully";
	}
?>
