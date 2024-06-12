<?php
	if(isset($_POST['region_name'])){
		include("db_connection.php");
		$region_name = $_POST['region_name'];
		$query = "INSERT INTO tbl_region(name,created_at) VALUES('$region_name',now())";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "Region Added Successfully";
	}
?>
