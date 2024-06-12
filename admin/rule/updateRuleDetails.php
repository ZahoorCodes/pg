<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
  // get values
    $id = $_POST['id'];
    $rule_name = $_POST['rule_name'];
    echo"  $rule_name";
    // Update Rule details
    $query = "UPDATE tbl_rule SET name = '$rule_name', updated__at =now() WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));

    }
}
