<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
  // get values
    $id = $_POST['id'];
    $dist_name = $_POST['name'];
    echo"  $region_name";
    // Updaste Region details
    $query = "UPDATE tbl_district SET name = '$dist_name',updated_at =now() WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));

    }
}
