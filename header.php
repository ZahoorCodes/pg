<?php
    session_start();
include "config.php";
 include('db_conn.php');
?>
<!DOCTYPE html>
<HTML>
<head>
	<title>Home</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<meta charset="UTF-8">
   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCudBpXC3TqbR1PIrqMctQxuIs2YR27Ssk&libraries=places"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.png" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
  <!--===============================================================================================-->
  <!--link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"-->
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body class="">

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="wrap-menu-header gradient1 trans-0-4">
			<div class="container h-full">
				<div class="wrap_header trans-0-3">
					<!-- Logo -->
					<div class="logo">
						<a href="index.html">
							<!--<img src="#" alt="IMG-LOGO" data-logofixed="images/icons/logo2.png">-->
						</a>
					</div>

					<!-- Menu -->
					<div class="wrap_menu p-l-45 p-l-0-xl">
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a href="/pg/index.php">Home</a>
								</li>
                <li>
									<a href="/pg/list_pg.php">List Your PG</a>
								</li>
                <!---li>
                    <a href="/pg/pgs.php">PG List</a>
                  </li-->
                                <?php
                                    if(isset($_SESSION["user"])){
                                        echo"<li>
									           <a href='/pg/profile.php'>MY Profile </a>
								            </li>";
                                        echo"<li>
									           <a href='/pg/logout.php'> Log out  </a>
								            </li>";
                                    }
                                else{
                                       echo"<li>
									           <a href='/pg/signup.php'> Sign up </a>
								            </li>
                                            <li>
									           <a href='/pg/login.php'> Sign in </a>
								            </li>";
                                }
                                ?>
								<!--li>
									<a href="menu.html">Menu</a>
								</li>

								<li>
									<a href="reservation.html">Reservation</a>
								</li>

								<li>
									<a href="gallery.html">Gallery</a>
								</li>

								<li>
									<a href="about.html">About</a>
								</li-->



							</ul>
						</nav>
					</div>

					<!-- Social -->
				<?php   if(isset($_SESSION["user"]) && $_SESSION["user_type"]==1){
    echo"<div class='social flex-w flex-l-m p-r-20'>
						<i>Admin Panel</i>
						<button class='btn-show-sidebar m-l-33 trans-0-4'></button>
					</div>";
                                                    }
                    ?>

				</div>
			</div>
		</div>
	</header>
		<!-- Sidebar -->
    		<?php   if(isset($_SESSION["user"]) && $_SESSION["user_type"]==1){

          ?>
	<aside class="sidebar trans-0-4">
		<!-- Button Hide sidebar -->
		<button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

		<!-- - -->
		<ul class="menu-sidebar p-t-95 p-b-70">
            <li class="t-center m-b-13">
				<!-- Button3 -->
				<a href="/pg/admin/region/" class="txt19">
					Region
				</a>
			</li>
			<li class="t-center m-b-13">
				<a href="/pg/admin/district/index.php" class="txt19">District</a>
			</li>
            	<li class="t-center m-b-13">
				<a href="/pg/admin/locality/index.php" class="txt19">Locality</a>
			</li>
            <li class="t-center m-b-13">
				<a href="/pg/admin/facility/index.php" class="txt19">PG Facility</a>
			</li>
               <li class="t-center m-b-13">
				<a href="/pg/admin/rule/index.php" class="txt19">PG Rules</a>
			</li>
             <li class="t-center m-b-13">
				<a href="/pg/admin/pg/index.php" class="txt19">Pg's</a>
			</li>
               <li class="t-center m-b-13">
				<a href="/pg/admin/user/index.php" class="txt19">Users</a>
			</li>




		</ul>

		<!-- - -->
		<div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">

		</div>
	</aside>
<?php } ?>
