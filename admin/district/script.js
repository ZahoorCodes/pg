function addRecord() {
    // get values
    var name = $("#name").val();
	var region_id = $("#region_id").val();
    // Add record
    $.post("addRecord.php",{
        name:name,
		region_id:region_id,
		
    }, function (data, status) {
        $("#add_new_record_modal").modal("hide");
        readRecords();
		$("#name").val("");
		
        $("#region_id").val("");
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

function DeleteDist(id) {
    var conf = confirm("Are you sure, do you really want to delete District?");
    if (conf == true) {
        $.post("deleteDist.php", {
                id: id
            },
            function (data, status) {
                // reload Regions by using readRecords();
                readRecords();
            }
        );
    }
}