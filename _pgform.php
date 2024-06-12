
<?php $action=(!empty($id) ?'edit_listing.php':'list_pg.php'); ?>

<div class="container">
        <h3 class="tit7 t-center p-b-62 p-t-105">
            List Your PG For Free
        </h3>

        <form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data" class="wrap-form-reservation size22 m-l-r-auto">
            	<input type="hidden" name="id" value="<?php  if ($action=='edit_listing.php') echo $id; ?>">
                <input type="hidden" name="edit_image" value="<?php  echo($action=='edit_listing.php')?  $image :"" ;?>">
                 <input type="hidden" name="user_id" value="<?php  echo($action=='edit_listing.php')?  $user :"" ;?>">
                 <input type="hidden" name="status" value="<?php  echo($action=='edit_listing.php')?  $status :"" ;?>">
                 <input type="hidden" name="edit_video" value="<?php  echo($action=='edit_listing.php')?  $video :"" ;?>">

            <div class="row">
                <div class="col-md-6">
                    <!-- Name -->
                    <span class="txt9">
                        Title
                    </span>

                    <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input required class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="title" placeholder="Pg Title"  value="<?php  if ($action=='edit_listing.php') echo $title; ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Email -->
                    <span class="txt9">
                        Address
                    </span>

                    <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input required id="address" class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="address" placeholder="address" value="<?php  if ($action=='edit_listing.php') echo $address; ?>">
                        <span class="txt9">
                            <?php  //$email_error; ?>
                        </span>
                    </div>
                </div>


            </div>

            <div class="row">

                <div class="col-md-4">
                    <!-- Phone -->
                    <span class="txt9">
                        Region
                    </span>

                    <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        		  <?php
                                        $q="select * from tbl_region";
                                        $result=mysqli_query($con,$q);
                                    if(mysqli_num_rows($result)>0){
                                        echo"<select name='region'  class='selection-'>
                                        <option value='' >select region</option>";
                                            while($row=mysqli_fetch_assoc($result))
                                            {
                                                unset($rid,$name);
                                                $rid=$row["id"];
                                                $name=$row["name"];
                                                  $selected="";
                                                if($row["id"]===$region)
                                                $selected="selected";
                                                echo'<option value="'.$rid.'". '.$selected.'>'.$name.'</option>';
                                            }
                                echo"</select>";
                                }
                                ?>
                    </div>
                </div>
                <div class="col-md-4">
                  <!-- People -->
                  <span class="txt9">
                    District
                  </span>

                  <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
                    <!-- Select2 -->
                        <select name="district"  class="selection-1">
                          <?php if ($action=='edit_listing.php'){

                            $q="select * from tbl_district WHERE region_id='$region'";
                            $result=mysqli_query($con,$q);
                        if(mysqli_num_rows($result)>0){

                                while($row=mysqli_fetch_assoc($result))
                                {
                                    unset($did,$name);
                                    $did=$row["id"];
                                    $name=$row["name"];
                                      $selected="";
                                    if($row["id"]===$district)
                                    $selected="selected";
                                    echo'<option value="'.$did.'". '.$selected.'>'.$name.'</option>';
                                }

                    }

                          } ?>
                        </select>

                  </div>
                </div>
                <div class="col-md-4">
                  <!-- People -->
                  <span class="txt9">
                    Locality
                  </span>

                  <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
                    <!-- Select2 -->
                        <select name="locality"  class="selection-1">
                          <?php if ($action=='edit_listing.php'){

                            $q="select * from tbl_locality WHERE district_id='$district'";
                            $result=mysqli_query($con,$q);
                        if(mysqli_num_rows($result)>0){

                                while($row=mysqli_fetch_assoc($result))
                                {
                                    unset($lid,$name);
                                    $lid=$row["id"];
                                    $name=$row["name"];
                                      $selected="";
                                    if($row["id"]===$locality)
                                    $selected="selected";
                                    echo'<option value="'.$lid.'". '.$selected.'>'.$name.'</option>';
                                }

                    }

                          } ?>
                        </select>
                  </div>
                </div>

            </div>
            <div class="row">





            </div>

            <div class="row">
               <div class="col-md-6">
                    <!-- Name -->
                    <span class="txt9">
                        Contact
                    </span>

                    <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input required class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="contact" placeholder="Contact" value="<?php  if ($action=='edit_listing.php') echo $contact; ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Email -->
                    <span class="txt9">
                        landmark
                    </span>

                    <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                         <input required class="bo-rad-10 sizefull txt10 p-l-20" type="text" value=" <?php  if ($action=='edit_listing.php') echo $landmark; ?>" name="landmark" placeholder="Nearest landmark">
                        <span class="txt9">
                            <?php ?>
                        </span>
                    </div>
                </div>


            </div>

            <div class="row">

            <span class="txt9">
							Describe Your PG
						</span>
						<textarea   class="bo-rad-10 size35 bo2 txt25 p-l-20 p-t-15 m-b-10 m-t-3" name="description" value=" <?php  if ($action=='edit_listing.php') echo $description; ?>" placeholder="Description">
                        <?php  if ($action=='edit_listing.php') echo $description; ?>
                    </textarea>
            </div>
            <div class="row">
                   <div class="col-md-6">
                    <!-- Email -->
                    <span class="txt9">
                      Meals
                    </span>

                    <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <select name="meal" class="bo-rad-10 sizefull txt10 p-l-20" required>
                            <?php
		 						foreach($m_array as $key=> $value)
		 							{
		 								$selected = (($meal_type== $key)? "selected" : "") ;
		 								echo "<option value= '$key' $selected> $value </option>";
		 							}
		 					?>
                        </select>



                        <span class="txt9">
                            <?php ?>
                        </span>
                    </div>
                </div>
                  <div class="col-md-6">
                    <span class="txt9">
                      Image
                    </span>
                    <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                      <input type="file" name="image" placeholder="Images" class="">

                    </div>

                </div>

            </div>
            <div class="row">
              <div class="col-md-6">
                  <!-- Phone -->
                  <span class="txt9">
                    video

                  </span>

                  <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                      <input type="file" name="video" placeholder="Video" class="">
                  </div>

              </div>

              <div class="col-md-6">
                  <!-- Phone -->
                  <span class="txt9">
                     Budget(<i>per month</i>)

                  </span>

                  <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                      <input required class="bo-rad-10 sizefull txt10 p-l-20"  min="0" type="number" name="budget"  placeholder="budget" value="<?php  if ($action=='edit_listing.php') echo $budget; ?>">
                  </div>
                  <span class="txt9">
                      <?php //echo $password_error; ?>
                  </span>
              </div>


            </div>

             <div class="row">

                <div class="col-md-6">
                     <span class="txt9">
                       <b>Pg Rules</b>
                    </span><br>

                    	<?php
                $sql_rules="select * from tbl_rule";
                $result_1=mysqli_query($con,$sql_rules);
        if(mysqli_num_rows($result_1)>0)
			 {
  				while($row_1=mysqli_fetch_assoc($result_1))
  				{
              if($action=='edit_listing.php')
              {

                   $pg_rule="SELECT tbl_pgrules.rule_id FROM tbl_pgrules WHERE pg_id='$id'";

                  $array_1 = array();

            $result_2=mysqli_query($con,$pg_rule);
        if(mysqli_num_rows($result_2)>0){
            while($row_2 = mysqli_fetch_assoc($result_2)){

                $array_1[] = $row_2;

            }
            }
          $ruleids = array_column($array_1, 'rule_id');

                    if(in_array ( $row_1['id'],  $ruleids ,TRUE ))
                {

                    $checked="checked";
                }
                else {
                    $checked="";
                  }
                  echo " <input type='checkbox' name='rules[]' $checked  value='$row_1[id]'>$row_1[name]</input><br>";
              }
    else {
      echo "<input type='checkbox' name='rules[]'   value='$row_1[id]'>$row_1[name]</input><br>";
        }
        // }}
      //  }
      }
    }
                    ?>
                 </div>
                   <div class="col-md-6">
                     <span class="txt9">
                       <b>Pg Facilities</b>
                    </span><br>

			<?php
                $sql_facilite="select * from tbl_facilite";
                $result_3=mysqli_query($con,$sql_facilite);
        if(mysqli_num_rows($result_3)>0)
			 {
  				while($row_3=mysqli_fetch_assoc($result_3))
  				{
              if($action=='edit_listing.php')
              {
                   $query_facility="SELECT tbl_pgfacility.facility_id FROM tbl_pgfacility WHERE pg_id=$id";
                //"SELECT tbl_asset.id FROM  tbl_asset  INNER JOIN tbl_resource_asset ON tbl_asset.id =tbl_resource_asset.asset_id WHERE tbl_resource_asset.room_id='$id'";
                    // set array
            $array_2 = array();
                  // look through query
            $result_4=mysqli_query($con,$query_facility);
        if(mysqli_num_rows($result_4)>0){
            while($row_4 = mysqli_fetch_assoc($result_4)){
                $array_2[] = $row_4;
            }
            }
          $facilityids = array_column($array_2, 'facility_id');
                    if(in_array ( $row_3['id'], $facilityids ,TRUE ))
                {

                    $checked_="checked";
                }
                else {
                    $checked_="";
                  }
                  echo "<input type='checkbox' name='facilities[]' $checked_  value='$row_3[id]'>$row_3[facility_name]</input><br>";
              }
                else {
                        echo "<input type='checkbox' name='facilities[]'   value='$row_3[id]'>$row_3[facility_name]</input><br>";
                }
        // }}
      //  }
                }
        }
                    ?>

                 </div>

            </div>


            <div class="row">

                <div class="col-md-6">

                    <div class="wrap-btn-booking flex-c-m m-t-13">
                        <input type="submit" name="submit" id="submit" value="Add" class="btn3 flex-c-m size36 txt11 trans-0-4">
                    </div>
                </div>
            </div>

        </form>


    </div>

	<div id="dropDownSelect1"></div>

<script>

$( "select[name='region']" ).change(function () {

    var regionID = $(this).val();


    if(regionID) {


        $.ajax({

            url: "ajaxpro.php",

            dataType: 'Json',

            data: {'id':regionID},

            success: function(data) {

                $('select[name="district"]').empty();
								$('select[name="district"]').append('<option value=""> Select District </option>');


                $.each(data, function(key, value) {

                    $('select[name="district"]').append('<option value="'+ key +'">'+ value +'</option>');

                });

            }

        });


    }else{

        $('select[name="district"]').empty();

    }

});

$( "select[name='district']" ).change(function () {

    var districtID = $(this).val();


    if(districtID) {


        $.ajax({

            url: "locality_data.php",

            dataType: 'Json',

            data: {'id':districtID},

            success: function(data) {

                $('select[name="locality"]').empty();

                $.each(data, function(key, value) {

                    $('select[name="locality"]').append('<option value="'+ key +'">'+ value +'</option>');

                });

            }

        });


    }else{

        $('select[name="locality"]').empty();

    }

});


var input = document.getElementById('address');

     var options = {
        types: ['geocode'], //this should work !
          componentRestrictions: {country: "IN"}
      };
autocomplete = new google.maps.places.Autocomplete(input, options);
</script>
