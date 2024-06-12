
function addRecord() {
    // get values
    var facility_name = $("#facility_name").val();
    // Add record
    $.post("addRecord.php",{
	facility_name:facility_name,
    }, function (data, status) {
        $("#add_new_record_modal").modal("hide");
        readRecords();
        $("#facility_name").val("");
    });
}
function readRecords() {
    $.get("readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});



function DeleteFacility(id) {
    var conf = confirm("Are you sure, do you really want to delete Facility?");
    if (conf == true) {
        $.post("deleteFacility.php", {
                id: id
            },
            function (data, status) {
                // reload Regions by using readRecords();
                readRecords();
            }
        );
    }
}

function GetFacilityDetails(id) {
    // Add Facility ID to the hidden field for furture usage
    $("#hidden_facility_id").val(id);
	// $("#update_facility_name").val(facility_name);
	
    $.post("readFacilityDetails.php", {
            id: id
			
        },
        function (data, status) {
            // PARSE json data
            var facility = JSON.parse(data);

            // Assing existing values to the modal popup fields
            $("#update_facility_name").val(facility.name);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateFacilityDetails() {
    // get values
    var facility_name = $("#update_facility_name").val();
    // get hidden field value
    var id = $("#hidden_facility_id").val();

    // Update the details by requesting to the server using ajax
    $.post("updateFacilityDetails.php", {
            id: id,
            facility_name: facility_name
            },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Regions by using readRecords();
            readRecords();
        }
    );
}


$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});





