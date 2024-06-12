<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
  // get values
    $id = $_POST['id'];
    $region_name = $_POST['region_name'];
    echo"  $region_name";
    // Updaste Region details
    $query = "UPDATE tbl_region SET name = '$region_name',updated_at =now() WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));

    }
}
