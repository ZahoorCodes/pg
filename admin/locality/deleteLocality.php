<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get region id
    $locality_id = $_POST['id'];

    // delete region
    $query = "DELETE FROM tbl_locality WHERE id = '$locality_id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}
?>
