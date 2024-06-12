<?php
	if(isset($_POST['rule_name'])){
		include("db_connection.php");
		$rule_name = $_POST['rule_name'];
		$query = "INSERT INTO tbl_rule(name,created_at) VALUES('$rule_name',now())";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "Rule Added Successfully";
	}
?>
