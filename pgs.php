<?php

include 'header.php';
        $sql= "SELECT * FROM tbl_pg WHERE status=1 ORDER BY created_at DESC";
    $result= mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0)
    {
  echo"<br><br><br><br><div class='row'>";
        while ($row=mysqli_fetch_assoc($result))
        {


            echo"<div class='col-md-4 p-t-30'>
<!-- Block1 -->
<div class='blo1'>
<div class='wrap-pic-blo1 bo-rad-10 hov-img-zoom'>
<a href='#'><img src='$row[img]' alt='IMG-INTRO'></a>
</div>

<div class='wrap-text-blo1 p-t-35'>
<a href=''#'><h4 class='txt5 color0-hov trans-0-4 m-b-13'>
$row[pg_title]
</h4></a>RS: $row[budget_per_month]<sub>per month</sub>

<!--p class='m-b-20'>
Phasellus lorem enim, luctus ut velit eget, con-vallis egestas eros.
</p-->
            <div class='row'>
        <div class='col-md-6'><br>
<a href='pglist.php?id=".$row['id']."' class='txt4'>
More Details
<i class='fa fa-long-arrow-right m-l-10' aria-hidden='true'></i>
</a>
            </div>";

            echo" </div>
</div>
</div>
</div>";



    }
    echo"</div>";
}
include 'script.php';
?>
