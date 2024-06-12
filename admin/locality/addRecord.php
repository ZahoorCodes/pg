<?php
include("db_connection.php");
	if(isset($_POST['name']) && isset($_POST['district_id'])){
		
		$name = $_POST['name'];
		$district_id = $_POST['district_id'];
		$query = "INSERT INTO tbl_locality(name,district_id) VALUES('$name','$district_id')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "Locality Added Successfully";
	}
?>

