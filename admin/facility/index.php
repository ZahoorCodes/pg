
    <?php include "../../header.php";

    if(!isset($_SESSION["user"]) ||$_SESSION["user_type"]!=1 )
    {
       // mysql_close($connection); // Closing Connection
       // header('Location: login.php'); // Redirecting To Home Page
      echo"<script>location.replace('/pg/index.php')</script>";
    }
?>
<head>
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
    <meta charset="UTF-8">
    <title>jkpg system</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css"/>

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

</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Facility</button>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12">
            <h3>Facilities:</h3>
            <div class="records_content"></div>
        </div>
    </div>

</div>
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="facility_name">Facility Name</label>
                    <input type="text" id="facility_name" placeholder="Facility Name" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_facility_name">Facility Name</label>
                    <input type="text" id="update_facility_name" placeholder="Facility Name" class="form-control"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateFacilityDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_facility_id">
            </div>
        </div>
    </div>
</div>



<!-- Jquery JS file -->
<script type="text/javascript" src="jquery-3.3.1.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="script.js"></script>
</body><?php
include "script.php";

include "../../footer.php" ?>
