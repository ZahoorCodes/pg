<?php
include('header.php');


?>

     <div class="container">
        <h3 class="tit7 t-center p-b-62 p-t-105">
           login
        </h3>
    <center>
     <form action="" method="post">

           <div class="row">

                <div class="col-md-6">
                    <!-- Phone -->
                    <span class="txt9">
                        Email
                    </span>

                    <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input required class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="email" placeholder="email">
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Phone -->
                    <span class="txt9">
                         Password
                    </span>

                    <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input required class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="password" id="password" placeholder="Password">
                    </div>

                </div>
            </div>

            <div class="wrap-btn-booking flex-c-m m-t-13">

                <input type="submit" name="submit" id="submit" value="Sign Up" class="btn3 flex-c-m size36 txt11 trans-0-4">


            </div>

          <span>
                    <?php //echo $error; ?></span>
            </form>
        </center>
    </div>
    <?php

    include "footer.php";

    ?>
    <div id="dropDownSelect1"></div>
    <?php
      include "script.php";
     ?>

<?php

?>
<?php
       // session_start(); // Starting Session
        $error=''; // Variable To Store Error Message
        include('db_conn.php');
    if (isset($_POST['submit']))
    {

            // Define $username and $password
            $username=$_POST['email'];
            $password=$_POST['password'];
            $username = stripslashes($username);
            $password = stripslashes($password);
            //$username = mysql_real_escape_string($username);
            //$password = mysql_real_escape_string($password);
            // Selecting Database
            //$db = mysql_select_db("company", $connection);
            // SQL query to fetch information of registerd users and finds user match.
            $query = "select * from tbl_user where 	encrypted_password='$password' AND email='$username'";
            $result= mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0)
                            {
                                $rows = mysqli_fetch_assoc($result);
                                $_SESSION["user"]=$rows['name'];
                                $_SESSION["user_id"]=$rows['id'];
                                $_SESSION["user_type"]=$rows['user_type'];// Initializing Session
                               // header("location: profile.php"); // Redirecting To Other Page
                           echo"<script>location.replace('profile.php')</script>";
                         }
        else
                {
                $error ="Username or Password is invalid";
                echo $error;
            }
              //  mysql_close($connection); // Closing Connection

            }

            ?>

    
