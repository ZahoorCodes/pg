function addRecord() {
    // get values
    var region_name = $("#region_name").val();
    // Add record
    $.post("addRecord.php",{
        region_name:region_name,
    }, function (data, status) {
        $("#add_new_record_modal").modal("hide");
        readRecords();
        $("#region_name").val("");
    });
}
function readRecords() {
    $.get("readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}



function DeleteRegion(id) {
    var conf = confirm("Are you sure, do you really want to delete Region?");
    if (conf == true) {
        $.post("deleteRegion.php", {
                id: id
            },
            function (data, status) {
                // reload Regions by using readRecords();
                readRecords();
            }
        );
    }
}

function GetRegionDetails(id) {
    // Add Region ID to the hidden field for furture usage
    $("#hidden_region_id").val(id);
    $.post("readRegionDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var region = JSON.parse(data);

            // Assing existing values to the modal popup fields
            $("#update_region_name").val(region.name);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateRegionDetails() {
    // get values
    var region_name = $("#update_region_name").val();
    // get hidden field value
    var id = $("#hidden_region_id").val();

    // Update the details by requesting to the server using ajax
    $.post("updateRegionDetails.php", {
            id: id,
            region_name: region_name
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
