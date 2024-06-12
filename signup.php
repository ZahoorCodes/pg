<?php
include('header.php');
    $password_error=$email_error="";
 include('db_conn.php'); // Includes Login Script
    if(isset($_POST["submit"])){
//      /  echo"$_FILES['image'][name]" ;
          //$uploadedfilename=$_FILES['images']["name"];
        //echo"$uploadedfilename";
        $flag=true;
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $c_password=$_POST["confirm_password"];
        if($password!=$c_password){
            $flag=false;
        }

        $gender=$_POST["gender"];
        $contact=$_POST["contact"];
        $query = "select * from tbl_user where  email='$email'";
        $output= mysqli_query($con,$query);
        $rows = mysqli_num_rows($output);
            if ($rows == 1){
                $email_error="Account alredy exist";
                echo"<center class='txt9'><h1>Signup Failed</h1></center>";
            }
        else if(!$flag){
            $password_error="Password and Confirm password does not match";
             echo"<center class='txt9'><h1>Signup Failed</h1></center>";
        }
        else{
              if(!empty($_FILES["images"]["name"]))
                  {
                    $uploadedfilename=$_FILES["images"]["name"];
                    $uploadedfiletemporaryname=$_FILES["images"]["tmp_name"];
                    $uploadedfile_type=$_FILES["images"]["type"];
                    $fileextension=GetImageExt($uploadedfile_type);
                    $imagenewname=date("d-m-y")."-".time().$fileextension;
                    $target_path="images/users/".$imagenewname;
                    if(move_uploaded_file($uploadedfiletemporaryname,$target_path))
                    {
                      if(!empty($name & $email & $contact & $gender & $password))
                      {

                                $sql_query="INSERT INTO tbl_user(name,email,encrypted_password,user_type,created_at,contact,gender,image) VALUES('$name','$email','$password','2',now(),'$contact','$gender','$target_path')";
                                $result=mysqli_query($con,$sql_query);
                          if($result)
                          {
                              $query_ = "select * from tbl_user where  email='$email'";
                                $output_= mysqli_query($con,$query_);
                         if(mysqli_num_rows($output_)>0)
                            {
                                $rows_ = mysqli_fetch_assoc($output_);
                                $_SESSION["user"]=$rows_['name'];
                                $_SESSION["user_id"]=$rows_['id'];
                                $_SESSION["user_type"]=$rows_['user_type'];// Initializing Session
                               // header("location: profile.php"); // Redirecting To Other Page
                                echo"<script>location.replace('profile.php')</script>";
                         }
           }
	       else
	       {
                 echo "error in input  ".$sql.$con->error;
             //echo"<center class='txt9'><h1>Signup del</h1></center>".$sql_query.$con->error;
     //.$sql_query.$con->error;
	       }

                      }
                    }
                    else
                    {
                      exit("error while uploading image to server");
                    }
                }
                else{
                  echo "image cant be empty";
                }

        }


    }

?>

<head>
    <title>Signup </title>

</head>

<body>

    <div class="container">
        <h3 class="tit7 t-center p-b-62 p-t-105">
            Signup For Free
        </h3>

        <form action="signup.php" method="POST" enctype="multipart/form-data" class="wrap-form-reservation size22 m-l-r-auto">
            <div class="row">
                <div class="col-md-6">
                    <!-- Name -->
                    <span class="txt9">
                        Name
                    </span>

                    <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input required class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name">
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Email -->
                    <span class="txt9">
                        Email
                    </span>

                    <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input required class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="email" placeholder="Email">
                        <span class="txt9">
                            <?php echo $email_error; ?>
                        </span>
                    </div>
                </div>


            </div>

            <div class="row">

                <div class="col-md-6">
                    <!-- Phone -->
                    <span class="txt9">
                        Password
                    </span>

                    <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input required class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="password" placeholder="Password">
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Phone -->
                    <span class="txt9">
                        Confirm Password
                    </span>

                    <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input required class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="confirm_password" id="c_password" placeholder="Confirm_Password">
                    </div>
                    <span class="txt9">
                        <?php echo $password_error; ?>
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Name -->
                    <span class="txt9">
                        Contact
                    </span>

                    <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input required class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="contact" placeholder="Contact">
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Email -->
                    <span class="txt9">
                        Gender
                    </span>

                    <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <select name="gender" class="bo-rad-10 sizefull txt10 p-l-20" required>
                            <?php
		 						foreach($g_array as $key=> $value)
		 							{
		 								$selected = (($status== $key)? "selected" : "") ;
		 								echo "<option value= '$key' $selected> $value </option>";
		 							}
		 					?>
                        </select>



                        <span class="txt9">
                            <?php ?>
                        </span>
                    </div>
                </div>


            </div>


            <div class="row">
                <div class="col-md-6">
                    <input type="file" name="images" class="bbo-rad-10 sizefull txt10 p-l-20" placeholder="Images">


                </div>
                <div class="col-md-6">

                    <div class="wrap-btn-booking flex-c-m m-t-13">
                        <input type="submit" name="submit" id="submit" value="Sign Up" class="btn3 flex-c-m size36 txt11 trans-0-4">
                    </div>
                </div>
            </div>

        </form>

        <center class="txt9">
            Already have an account? <br><a href="login.php" class="btn3 flex-c-m size36 txt11 trans-0-4">Login</a>!
        </center>

    </div>
    <!--center>
        <h1>Enter Detils</h1>
        <form action="" method="post">
            <label>Name :</label>
            <input name="name" placeholder="Enter yor Name" type="text" required><br><br>

            <label>Email :</label>
            <input name="email" placeholder="Your Email" type="email" required><br><br>

            <label>Password :</label>
            <input  name="password" placeholder="**********" type="password"><br><br>

            <input name="submit" type="submit" value=" Sign up ">

            <span>

                <?php //echo $error; ?>
            </span>

        </form>

    </center-->

</body>

<?php

include 'script.php';

include 'footer.php';
?>
<script>
    $(function() {
        $('#c_password').change(function() {
            //alert('Hi');
            var password = document.getElementsById("password").value;
            var c_password = document.getElementById("c_password").value;
            if (password != c_password) {

                $("#submit").attr("readonly", "true");
                alert("password doesnt match");
            }

            //var $form = $(this).closest('form');
            //$form.find('input[type=submit]').click();
        });
    });
</script>

</html>
