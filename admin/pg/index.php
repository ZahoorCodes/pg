
    <?php include "../../header.php";

    if(!isset($_SESSION["user"]) ||$_SESSION["user_type"]!=1 )
    {
       // mysql_close($connection); // Closing Connection
       // header('Location: login.php'); // Redirecting To Home Page
      echo"<script>location.replace('/pg/index.php')</script>";
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
<br>
<br>
<br>
<br>
<br>
<br><br><br>
<br>
<br>
<br>
<br>
<br><br>

<div class="container">

    <div class="row">
       <?php
                if(isset($_POST['submit'])){
            $status=$_POST['status'];
            echo"$status";
             $id = $_POST['id'];
             $query = "UPDATE tbl_pg SET status = '$status',updated_at =now() WHERE id = '$id'";
                  $result=mysqli_query($con,$query);
                          if($result)
                          {

                                echo"<script>alert('Status cHANGED')</script>";
                         }

	       else
	       {
                 echo "error in input  ".$query.$con->error;
             //echo"<center class='txt9'><h1>Signup del</h1></center>".$sql_query.$con->error;
     //.$sql_query.$con->error;
	       }
        }


	// Design initial table header

	$query = "SELECT * FROM tbl_pg ORDER BY created_at DESC";
	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
    // if query results contains rows then featch those rows
    if(mysqli_num_rows($result) > 0)
    {
    	 echo"<table class='table table-bordered table-striped'>
						<tr>


							 <th> Name</th>
						      <th>Address</th>
							 <th>Change Status</th>

						</tr>";
    	while($row = mysqli_fetch_assoc($result))
    	{
    		echo"<tr>


				<td>$row[pg_title]</td>
                <td>$row[address]</td>
               ";
            if($row['status']==1){

				echo"<td>$row[status]<form method='post' action=''>
            	       <input type='hidden' name='id' value='$row[id]'>

                        <input type='hidden' value='2' name='status'>
                        <input type='submit' value='Unpublish' name='submit' class='btn btn-danger'>
                    </form>

					</td>";
            }
            else{

                echo"<td>$row[status]<form method='post' action=''>
                         <input type='hidden' name='id' value='$row[id]'>
                        <input type='hidden' value='1' name='status'>
                        <input type='submit' value='publish' name='submit' class='btn btn-success'>
                    </form>

					</td>";
            }
			echo"</tr>";

    	}
    }
    else
    {
    	echo"<tr><td colspan='6'>Records not found!</td></tr>";
    }
   echo"</table>";




?>

    </div>

</div>

<!-- Jquery JS file -->
<script type="text/javascript" src="jquery-3.3.1.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="script.js"></script>

<?php
include "script.php";

include "../../footer.php" ?>
