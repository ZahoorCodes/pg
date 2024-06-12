
<?php
include("db_connection.php");
	if(isset($_POST['name']) && isset($_POST['region_id'])){
		
		$name = $_POST['name'];
		$region_id = $_POST['region_id'];
		$query = "INSERT INTO tbl_district(name,region_id) VALUES('$name','$region_id')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "Locality Added Successfully";
	}
?>

