function addRecord() {
    // get values
    var name = $("#name").val();
	var region_id = $("#region_id").val();
    // Add record
    $.post("crud/addRecord.php",{
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
    $.get("crud/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});
