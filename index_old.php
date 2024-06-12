<?php

include 'header.php';
$flag="";
?>
<br>
<style>
    .a{
        background-image: url("image3.jpg");
    }
</style>

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
    <form action="index_old.php#pgs.php" method="post" >
      <p><label><i class="fa fa-map-marker"></i> Location</label></p>
      <input class="w3-input w3-border" type="text" placeholder="e.g 114-B Jammu" name="address" >
      <p><label><i class="fa fa-map"></i> Locality </label></p>
      <select name="region_id" class="selection-1 w3-input w3-border">
          <option value="">--- Select Locality ---</option>
          <?php
          //$district=$_POST["district_id"];
          $sql = "SELECT * FROM tbl_locality";
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

</nav>

<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main w3-white" style="margin-left:260px">
  <div class="w3-hide-large" style="margin-top:80px"></div>
  <div class="w3-container">
    <br><br><br><br><br><br><br><br>
    <?php

        if(isset($_POST['search'])){
///												$input = $_POST['name'];
//												 $address = $_POST['address'];
//												 $locality = $_POST['locality'];
//												 $meal_type = $_POST['meal'];
//												 $budget=$_POST['budget'];
             $fields = array('pg_title', 'address', 'locality_id','region_id','district_id', 'meal_type', 'budget_per_month');
              $conditions = array();
          foreach($fields as $field){
              if(isset($_POST[$field]) && $_POST[$field] != '') {
                $conditions[] = "`$field` LIKE '%" . mysqli_real_escape_string($con,$_POST[$field]) . "%'";
                }
          }
      $query = "SELECT * FROM tbl_pg ";
  if(count($conditions) > 0) {
    $query .= "WHERE " . implode (' OR ', $conditions);
}
//	echo "$query";
//  $sql= "SELECT * FROM tbl_pg WHERE status=1 AND  `address` LIKE '%$address%'  OR `pg_title` LIKE '%$input%' ";
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
  <?php
}
 ?>
  </div>
    <?php }
    else{
     echo "No Results Found";
    }
  }

     else{
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


<div id="dropDownSelect1"></div>

<?php

include 'script.php';

include 'footer.php';
?>
<script>
    $("select[name='region_id']").change(function() {

        var regionID = $(this).val();


        if (regionID) {


            $.ajax({

                url: "ajaxpro.php",

                dataType: 'Json',

                data: {
                    'id': regionID
                },

                success: function(data) {

                    $('select[name="district_id"]').empty();
                    $('select[name="district_id"]').append('<option value=""> Select District </option>');


                    $.each(data, function(key, value) {

                        $('select[name="district_id"]').append('<option value="' + key + '">' + value + '</option>');

                    });

                }

            });


        } else {

            $('select[name="district_id"]').empty();

        }

    });

    $("select[name='district_id']").change(function() {

        var districtID = $(this).val();


        if (districtID) {


            $.ajax({

                url: "locality_data.php",

                dataType: 'Json',

                data: {
                    'id': districtID
                },

                success: function(data) {

                    $('select[name="locality_id"]').empty();

                    $.each(data, function(key, value) {

                        $('select[name="locality_id"]').append('<option value="' + key + '">' + value + '</option>');

                    });

                }

            });


        } else {

            $('select[name="locality_id"]').empty();

        }

    });

</script>
