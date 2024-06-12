<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>jkpg system</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Districts</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New District</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Districts:</h3>
            <div class="records_content"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add New District</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">District Name</label>
                    <input type="text" id="name" placeholder="District Name" class="form-control"/>
                </div>

            </div>
			<div class="modal-body">
                <div class="form-group">
                    <label for="name">Region</label>
                    <input type="text" id="region_id" placeholder="Region Name" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button"  id="submit" class="btn btn-primary" onclick="addRecord()">Add Record</button>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS file -->
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
