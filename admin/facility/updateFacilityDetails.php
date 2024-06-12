<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
  // get values
    $id = $_POST['id'];
    $facility_name = $_POST['facility_name'];
  //  echo"  $region_name";
    // Updaste Region details
    $query = "UPDATE tbl_facilite SET facility_name = '$facility_name',updated_at =now() WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));

    }
}
