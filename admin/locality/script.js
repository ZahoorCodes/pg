function addRecord() {
    // get values
    var name = $("#name").val();
	
	var district_id = $("#district_id").val();
    // Add record
    $.post("addRecord.php",{
        name:name,
		
		district_id:district_id,
    }, function (data, status) {
        $("#add_new_record_modal").modal("hide");
        readRecords();
        $("#name").val("");
		
		$("#district_id").val("");
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


function DeleteLocality(id) {
    var conf = confirm("Are you sure, do you really want to delete Locality?");
    if (conf == true) {
        $.post("deleteLocality.php", {
                id: id
            },
            function (data, status) {
                // reload Regions by using readRecords();
                readRecords();
            }
        );
    }
}