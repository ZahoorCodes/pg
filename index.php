<?php
include "header.php";
?>
<style>
    #search {
        background-image: url("images/bkndg.jpeg");
        height: 100%;
        width: 100%;
    }
</style>
<section id="search" class="section-reservation bg1-pattern p-t-100 p-b-113 a">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-b-30"><br>
              <br>
              <br><br>
              <br> <br><br><br>
                <br>
                <div class="t-center">
                    <span class="tit2 t-center">

                    </span>

                    <h5 class="">
                      Find your PG
                    </h5>
                </div>

                <form class="wrap-form-reservation size22 m-l-r-auto" method="post" action="districts_pg.php">
                    <div class="row">
                       <div class="col-md-12">
                          <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <!-- Select2 -->
                                <select name="district_id" class="selection-1" onchange="this.form.submit()">
                                    <option value="">Search Pg In</option>
                                    <?php
                                    	$sql = "SELECT * FROM tbl_district";
                                      	$result = mysqli_query($con,$sql);
                                        	while($row = mysqli_fetch_assoc($result)){
                                            	echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                            	}
                                              	?>
                                              </select>


                                              </div>
                                            </div>
                                         </div>
                                     </form>
                                 </div>
                               </div>
                           </div>
                 </section>
                 <?php
                   $sql= "SELECT * FROM tbl_pg WHERE status=1 ORDER BY created_at DESC LIMIT 6";
                     $result= mysqli_query($con, $sql);
                     if(mysqli_num_rows($result)>0)
                     {
                   echo"<hr><center><h3><b>Latest PG's</b></h3></centere><div class='row'>";

                         while ($row=mysqli_fetch_assoc($result))
                         {
                           echo"<div class='col-md-2 p-t-30 '>
                 <!-- Block1 -->
                 <div class='blo1'>
                 <div class='wrap-pic-blo1 bo-rad-10 hov-img-zoom'>

                 <a href='#'><img src='$row[img]' alt='IMG-INTRO'></a>
                 </div>

                 <div class='wrap-text-blo1 p-t-35'>
                 <a href='pg.php?id=".$row['id']."'><h5 >
                  $row[pg_title]
                  </h5></a>
                <br>RS: $row[budget_per_month]<sub>P/M</sub>

                             <div class='row'>
                         <div class='col-md-12'><br>
                 <a href='pglist.php?id=".$row['id']."' class='txt4'>
                 More Info
                 <i class='fa fa-long-arrow-right ' aria-hidden='true'></i>
                 </a>
                             </div>";

                             echo" </div>
                 </div>
                 </div>
                 </div>";



                     }



                     echo"</div>";
                 }
                 ?>
<br>
<?php
$sql= "SELECT tbl_rating.pg_id, avg( rating ) as avg_rating FROM `tbl_rating` GROUP BY pg_id ORDER by avg_rating DESC  LIMIT 6";
  $result= mysqli_query($con, $sql);
  if(mysqli_num_rows($result)>0)
  {
echo"<hr><center><h3><b>High Rated PG's</b></h3></centere><div class='row'>";

      while ($row=mysqli_fetch_assoc($result))
      {
        $query="SELECT * from tbl_pg WHERE id='$row[pg_id]'";
        $result_pg=mysqli_query($con,$query);
        $pg_date=mysqli_fetch_assoc($result_pg);
        echo"<div class='col-md-2 p-t-30 '>
<!-- Block1 -->
<div class='blo1'>
<div class='wrap-pic-blo1 bo-rad-10 hov-img-zoom'>

<a href='#'><img src='$pg_date[img]' alt='IMG-INTRO'></a>
</div>

<div class='wrap-text-blo1 p-t-35'>
<a href='pg.php?id=".$pg_date['id']."'><h5 >
$pg_date[pg_title]
</h5></a>
<br>RS: $pg_date[budget_per_month]<sub>P/M</sub>

          <div class='row'>
      <div class='col-md-12'><br>
<a href='pglist.php?id=".$pg_date['id']."' class='txt4'>
More Info
<i class='fa fa-long-arrow-right ' aria-hidden='true'></i>
</a>
          </div>";

          echo" </div>
</div>
</div>
</div>";



  }
  echo"</div>";
}

?>


<?php

include "footer.php";

?>
<div id="dropDownSelect1"></div>
<?php
  include "script.php";
 ?>
