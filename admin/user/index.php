<?php
include "../../header.php";
 if(!isset($_SESSION["user"]) || $_SESSION["user_type"]!=1)
    {
       // mysql_close($connection); // Closing Connection
       // header('Location: login.php'); // Redirecting To Home Page
      echo"<script>location.replace('../../index.php')</script>";
    }

$id= isset($_GET['id'])? $_GET['id']: '';

if(isset($_POST['makeadmin']))
{
	$status_admin= $_POST['admin_type'];
    $user_id=$_POST['id'];
	$q= "UPDATE tbl_user set user_type='$status_admin' WHERE id='$user_id'";
	$r= mysqli_query($con, $q);

if($r)
	echo "<h3 class='tit7 t-center p-b-62 p-t-105'>
           Updated
        </h3>";
else
	echo "<h3 class='tit7 t-center p-b-62 p-t-105'> Error In updating </h3>";
}



?>
  <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../../fonts/themify/themify-icons.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../../vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../../vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../../vendor/slick/slick.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../../vendor/lightbox2/css/lightbox.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../../css/util.css">
  	<link rel="stylesheet" type="text/css" href="../../css/main.css">
    <meta charset="UTF-8">
    <title>jkpg system</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css"/>
<div class="container">
    <h3 class="tit7 t-center p-b-62 p-t-105">
      Registered Users

    </h3>

    <br>

    <?php
	$sql= "SELECT * FROM tbl_user ORDER BY created_at DESC";
    $result= mysqli_query($con, $sql);
    echo"<div style='overflow-x:auto;'>";
	echo"<table class='table'>";
	echo"<tr> <td><strong>Image </strong></td> <td><strong>User Type</strong></td><td><strong>Name</strong></td><td><strong>Change User Type To</strong></td><td></td>

    </tr>";
	if(mysqli_num_rows($result)>0)
			{
            //$s_no=0;
				while ($row=mysqli_fetch_assoc($result))
				{
				echo "<td> <img src='/pg/$row[image]' style='height:150px; width:'150px';'> </td>";
				echo "<td>";

                    	foreach($user_type_array as $key=> $value)
		 							{
		 								if( $row['user_type']==$key){
                                            echo"$value
                                            ";
                                        }
		 							}
                    echo"</td>";
				echo "<td>$row[name]</td>";

                echo "
                <td><form action='index.php' method='post'>
                  <input type='hidden' name='id' value='$row[id]'>
                <input type='hidden' name='admin_type' value='1'>
                <input type='submit' name='makeadmin' value='Admin' class='btn3 flex-c-m size36 txt11 trans-0-4'>
                        </form></td></tr>";
                    // $s_no++;
				}
			}
	echo "</table>";
	echo "</div>";
?>
</div>
<br>
<?php
include "script.php";

include "../../footer.php" ?>
