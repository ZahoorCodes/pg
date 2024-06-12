<?php
include('header.php');
 if(!isset($_SESSION["user"]))
    {
       // mysql_close($connection); // Closing Connection
       // header('Location: login.php'); // Redirecting To Home Page
      echo"<script>location.replace('login.php')</script>";
    }

//$id= isset($_GET['id'])? $_GET['id']: '';

if(isset($_POST['deletepg']))
{
    $id= $_POST['id'];
    $pf="DELETE FROM tbl_pgfacility where pg_id='$id'";
    $pr="DELETE FROM tbl_pgrules where pg_id='$id'";
   	$result= mysqli_query($con,$pf);
    $result_= mysqli_query($con,$pr);
    if($result && $result_){
        $q= "DELETE from tbl_pg WHERE id= '$id'";
	$r= mysqli_query($con, $q);

if($r)
{


   echo"<h3 class='tit7 t-center p-b-62 p-t-105'>
         PG Deleted
        </h3>";
}
else
	echo "<h3 class='tit7 t-center p-b-62 p-t-105'> Cannot be Deletes.$q.$con->error</h3>";
}
    }

?>

<div class="container">
    	<section class="section-chef bgwhite p-t-115 p-b-95">
		<div class="container t-center">
			<span class="tit2 t-center">
				My Profile
			</span>

			<h3 class="tit5 t-center m-b-50 m-t-5">
				 <?php echo  $_SESSION["user"];
                //$_SESSION["user_type"];

                ?>
			</h3>
            <!--h6 class="tit7 t-center ">


			</h6-->


			<!-- for wishlist div class="row">


                    <?php
                         $user_id=$_SESSION["user_id"];
                                 // echo"<b>$user_id</b>";
                            $sql_query="SELECT * FROM tbl_user WHERE id=$user_id";
                         $result= mysqli_query($con, $sql_query);
                        if(mysqli_num_rows($result)>0)
                        {

                            while ($row=mysqli_fetch_assoc($result))
                            {
                                echo"<b></b>";

                               echo"<div class='row'>
				<div class='col-md-8 col-lg-4 m-l-r-auto p-b-30'>
					<!-- -Block5 -->
					<div class='blo5 pos-relative p-t-60'>
						<div class='pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t'>
							<a href='#'><img src='$row[image]' alt='IGM-AVATAR'></a>
						</div>

						<div class='text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30'>
							<a href='#' class='txt34 dis-block p-b-6'>
							$row[name]
							</a>

							<span class='dis-block t-center txt35 p-b-25'>
							<b>Phone:</b>$row[contact]
							</span>

							<p class='t-center'>
								Gender:";

                                  foreach($g_array as $key=>$value)
                                  {
                                      $gender=$row['gender'];
                                      if($key==$gender){
                                          echo "$value";
                                      }
                                    }
							echo"</p>
						</div>
					</div>
				</div>


			</div>";
                            }
                        }


    /*

                  if(isset($_SESSION["user_id"])){
                      $user_id=$_SESSION["user_id"];
                  }

                        $sql= "SELECT wishlist.*, courses.* FROM wishlist INNER JOIN courses on wishlist.course_id WHERE wishlist.course_id=courses.id AND wishlist.user_id=$user_id";
                        $result= mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)>0)
                        {

                            while ($row=mysqli_fetch_assoc($result))
                            {

				    echo"<div class='col-md-6 col-lg-4 '>
					<!-- -Block5 -->
					<div class='blo5 pos-relative p-t-60'>
						<div class='text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30'>
							<a href='#' class='txt34 dis-block p-b-6'>
								$row[course_name]
							</a>

							<span class='dis-block t-center txt35 p-b-25'>

							</span>";
                                $description=substr($row['course_description'],0    ,100);

							 echo"<p class='t-center'>



								$description
							</p>";
                             echo "<form action='' method='post'>
                                    <input type='hidden' name='id' value='".$row['course_id']."'>
                                    <input type='submit' name='removewishlist' value='Remove' class='btn3 flex-c-m size36 txt11 trans-0-4'>
                                </form>
						</div>
					</div>
				</div>";
                            }
                        }

                */?>

			</div-->
		</div>
	</section>


    <section class="section-intro">

		<div class="content-intro bg-white p-t-77 p-b-133">

            <div class="row">
                    <?php
         /*$user_id="";
                  if(isset($_SESSION["user_id"])){
                      $user_id=$_SESSION["user_id"];
                  }
                     if(isset($_POST['addtowishlist']))
                     {
	                       $course_id= $_POST['id'];
                       $query = "select * from wishlist where  course_id='$course_id' AND user_id='$user_id'";
                         $output= mysqli_query($con,$query);
                         $rows = mysqli_num_rows($output);
                         if ($rows == 1){
                             echo"<center><strong>Course already exist in your wish list</strong></center>";
                          }
                         else{
	                       $q= "INSERT INTO wishlist(course_id,user_id)VALUES('$course_id',$user_id)";
	                       $r= mysqli_query($con, $q);
                         if($r)
	                       echo "<h3 class='tit7 t-center p-b-62 p-t-105'>
                                aded to wishlist
                                </h3>";
                        else
	                           echo "<h3 class='tit7 t-center p-b-62 p-t-105'> problem in creaing wishlist </h3>";
                        }
                     }
                     */
                    echo" <div class='container t-center'>";
                        $sql= "SELECT * FROM tbl_pg WHERE status=1 AND user_id= '$user_id'";
                        $result= mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)>0)
                        {
                            echo"
                            <span class='tit2 t-center'>
                                My Listings
                            </span><div class='row'>";
                            while ($row=mysqli_fetch_assoc($result))
                            {
                              echo"
                                <div class='col-md-3 p-t-30'>
						                          <!-- Block1 -->
                        <div class='blo1'>
							<div class='wrap-pic-blo1 bo-rad-10 hov-img-zoom'>
								<a href='#'><img src='$row[img]' alt='IMG-INTRO'></a>
							</div>

							<div class='wrap-text-blo1 p-t-35'>
								<a href=''#'><h4 class='txt5 color0-hov trans-0-4 m-b-13'>
									$row[pg_title]
								</h4></a>RS: $row[budget_per_month]<sub>per month</sub>


                                <div class='row'>
                            <div class='col-md-6'><br>
								<a href='pg.php?id=".$row['id']."' class='txt4'>
									More Details
									<i class='fa fa-long-arrow-right m-l-10' aria-hidden='true'></i>
								</a>

                                <hr
                                <form action='' method='post'>
                                    <input type='hidden' name='id' value='".$row['id']."'>
                                    <input type='submit' name='deletepg' value='Delete' class='btn3 flex-c-m size36 txt11 trans-0-4'>
                                    </form>
                                    <br>

                                    <a href='edit_listing.php?id=".$row['id']."'class='btn3 flex-c-m size36 txt11 trans-0-4'>
									Edit PG

								</a>
                                </div>";

                                echo" </div>
							</div>
						</div>
					</div>";



                        }
                          echo"</div>";
                    }
                    echo"</div>";
                    ?>
				</div>
       </div>
    </section>
</div>





<?php

include 'script.php';

include 'footer.php';
?>
