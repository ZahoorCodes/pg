

  <?php
include "header.php";
?>
<!-- Sidebar/menu -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides {display: none}
</style>




<body class="w3-content w3-border-left w3-border-right">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-light-grey w3-collapse w3-top" style="z-index:3;width:260px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright"></i>
 <h3></h3>
 <br>
 <br> <br><br><br>
  <h3>Advanced</h3>
    <h6>Search </h6>
    <hr>
    <form action="index_old.php#pgs.php" method="post" target="_blank">
      <p><label><i class="fa fa-map-marker"></i> Location</label></p>
      <input class="w3-input w3-border" type="text" placeholder="e.g 114-B Jammu" name="address" >
      <p><label><i class="fa fa-map"></i> Locality </label></p>
      <select name="region_id" class="selection-1 w3-input w3-border">
          <option value="">--- Select Locality ---</option>
          <?php
          $district=$_POST["district_id"];
          $sql = "SELECT * FROM tbl_locality WHERE district_id= '$district'";
          $result = mysqli_query($con,$sql);
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value='".$row['id']."'>".$row['name']."</option>";
          }
          ?>
      </select>
      <!--input class="w3-input w3-border" type="text" placeholder="DD MM YYYY" name="CheckOut" required-->
      <p><label><i class="fa fa-cutlery "></i> Meal Type</label></p>
      <select name="meal_type" class="selection-1 w3-input w3-border">
          <option value="">Please SELECT</option>
          <?php
            foreach($m_array as $key=> $value)
            {
              echo "<option value= '$key'> $value </option>";
            }
            ?>
      </select>
      <!--input class="w3-input w3-border" type="number" value="1" name="Adults" min="1" max="6"-->
      <p><label><i class="fa fa-money"></i> Budget</label></p>
      <input class="w3-input w3-border" type="number" name="budget_per_month" min="0" >
      <br><p>
        <button class="w3-button w3-block w3-green w3-left-align" name="search"  type="submit"><i class="fa fa-search w3-margin-right"></i>
           Find PG
         </button>
       </p>
    </form>
  </div>
  <!--div class="w3-bar-block">
    <a href="#apartment" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-building"></i> Apartment</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-16" onclick="document.getElementById('subscribe').style.display='block'"><i class="fa fa-rss"></i> Subscribe</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-envelope"></i> Contact</a>
  </div-->
</nav>

<!-- Top menu on small screens -->
<!--header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <span class="w3-bar-item">Rental</span>
  <a href="javascript:void(0)" class="w3-right w3-bar-item w3-button" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header-->

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-white" style="margin-left:260px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:80px"></div>

  <!-- Slideshow Header -->
  <!--div class="w3-container" id="apartment">
    <h2 class="w3-text-green">The Apartment</h2>
    <div class="w3-display-container mySlides">
    <img src="/w3images/livingroom.jpg" style="width:100%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Living Room</p>
      </div>
    </div>
    <div class="w3-display-container mySlides">
    <img src="/w3images/diningroom.jpg" style="width:100%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Dining Room</p>
      </div>
    </div>
    <div class="w3-display-container mySlides">
    <img src="/w3images/bedroom.jpg" style="width:100%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Bedroom</p>
      </div>
    </div>
    <div class="w3-display-container mySlides">
    <img src="/w3images/livingroom2.jpg" style="width:100%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Living Room II</p>
      </div>
    </div>
  </div-->
  <!--div class="w3-row-padding w3-section">
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="/w3images/livingroom.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(1)" title="Living room">
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="/w3images/diningroom.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(2)" title="Dining room">
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="/w3images/bedroom.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(3)" title="Bedroom">
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="/w3images/livingroom2.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(4)" title="Second Living Room">
    </div>
  </div-->

  <div class="w3-container">
    <br><br><br><br><br><br><br><br>
    <?php
      $district=$_POST["district_id"];

    	$query = "SELECT * FROM tbl_pg where district_id='$district' ";
      $result= mysqli_query($con, $query);
    if(mysqli_num_rows($result)>0)
    {
      ?>
<div class="row">
      <?php
    while ($row=mysqli_fetch_assoc($result))
    {
      ?>
      <div class='col-md-3 p-t-30'>
          <div class='blo1'>
            <div class='wrap-pic-blo1 bo-rad-10 hov-img-zoom'>
              <a href='#'><img src="<?php echo"$row[img]"; ?>" style="height:200px;width:250px;" alt='IMG-INTRO'></a>
              <br><br>
              <h5 class='txt5 color0-hov trans-0-4 m-b-13'>
                <?php echo"$row[pg_title]"; ?>
              </h5>

                RS: <?php echo"$row[budget_per_month]"; ?> <sub>per month</sub>
                <center>    <a href="pglist.php?id=<?php echo"$row[id]"; ?>" class="w3-button  w3-green ">
                More Details
                <i class='fa fa-long-arrow-right m-l-10' aria-hidden='true'></i>
                </a>

              </center>
            </div>

      </div>
    </div>
    <?php } ?>
  </div>
    <?php }
    else{
     echo "No Results Found";
    }
    include "footer.php";
    ?>
</div>

<script>
// Script to open and close sidebar when on tablets and phones
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Slideshow Apartment Images
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>

</body>
</html>

















<!--section class="section-reservation bg1-pattern p-t-100 p-b-113 a">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-b-30">
                <div class="t-center">


                    <h3 class="tit3 t-center m-b-35 m-t-2">
                    Apply Filters
                    </h3>
                </div>

                <form class="" method="post" action="index_old.php#pgs">
                    <div class="row">
                        <!--div class="col-md-2">

                            <span class="txt9">
                                Name
                            </span>

                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="pg_title" placeholder="Name">
                            </div>
                        </div-->

                        <!--div class="col-md-4">
								< Date>
								<span class="txt9">
									Date
								</span>

								<div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="text" name="date">
									<i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18" aria-hidden="true"></i>
								</div>
							</div>

                        <div class="col-md-2">

                            <span class="txt9">
                                Location
                            </span>

                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="address" placeholder="location">
                            </div>
                        </div>
                        <div class="col-md-2">

                            <span class="txt9">
                                Locality
                            </span>

                            <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">

                                <select name="region_id" class="selection-1">

                                    <option value="">--- Select Locality ---</option>
                                    <?php

                                    /*
                                    $district=$_POST["district_id"];
												                        $sql = "SELECT * FROM tbl_locality WHERE district_id= '$district'";
												                                    $result = mysqli_query($con,$sql);

												while($row = mysqli_fetch_assoc($result)){

														echo "<option value='".$row['id']."'>".$row['name']."</option>";

												}*/

										?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">

                            <span class="txt9">
                                Meal Type
                            </span>

                            <div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">

                                <select name="meal_type" class="selection-1">
                                    <option value="">Please SELECT</option>
                                    <?php
                          /*    foreach($m_array as $key=> $value)
                            {
                              echo "<option value= '$key'> $value </option>";
                            }*/
                         ?>
                                </select>
                            </div>
                        </div>  <div class="col-md-2">

                              <span class="txt9">
                                  Budget
                              </span>

                              <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">

                                  <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" min=0 name="budget_per_month" placeholder="budget">
                              </div>
                          </div>

                          <div class="col-md-2">

                              <br>
                              <span class="txt9">

                              </span>

                              <div class="wrap-btn-booking flex-c-m m-t-6">
                                  <input type="submit" value="search" name="search" class="btn3 flex-c-m size13 txt11 trans-0-4">
                              </div>
                          </div>






                    </div>

                    <!--div class="row">
                        <div class="col-md-4">

                            <span class="txt9">
                                District
                            </span>

                            <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <!-- Select2 >
                                <select name="district_id" class="selection-1">

                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- People
                            <span class="txt9">
                                Locality
                            </span>

                            <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <!-- Select2 >
                                <select name="locality_id" class="selection-1">

                                </select>
                            </div>
                        </div>







                    </div>


                </form>
            </div>
        </div>
    </div>
</section-->

  <section class="section-intro">
    <div class="content-intro bg-white p-t-77 p-b-133">
        <div class="container">
            <div class="row">

<?php
/*
  $district=$_POST["district_id"];

	$query = "SELECT * FROM tbl_pg where district_id='$district' ";
  $result= mysqli_query($con, $query);
if(mysqli_num_rows($result)>0)
{
while ($row=mysqli_fetch_assoc($result))
{
  echo"
    <div class='col-md-3 p-t-30'>
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
          </div>";
  echo" </div>
  </div>
  </div>
  </div>";
}
}
else{
 echo "No Results Found";
}



*/?>
      </div>
    </div>
  </div>
</section>
<div id="dropDownSelect1"></div>
<?php
include "script.php";

?>
