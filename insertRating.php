<?php
session_start();
require_once ('db_conn.php');
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id
//$userId = 5;
$userId = $_SESSION["user_id"];
if (isset($_POST["index"], $_POST["restaurant_id"])) {
//echo "<script>alert('hi')</script>";
    $restaurantId = $_POST["restaurant_id"];
    $rating = $_POST["index"];

    $checkIfExistQuery = "select * from tbl_rating where user_id = '" . $userId . "' and pg_id = '" . $restaurantId . "'";
    if ($result = mysqli_query($con, $checkIfExistQuery)) {
        $rowcount = mysqli_num_rows($result);
    }

    if ($rowcount == 0) {
        $insertQuery = "INSERT INTO tbl_rating(user_id,pg_id,rating) VALUES ('$userId','$restaurantId','$rating') ";
        $result = mysqli_query($con, $insertQuery);
        echo "success done";
    } else {
        echo "Already Voted!";
    }
}
