function addRecord() {
    // get values
    var rule_name = $("#rule_name").val();
    // Add record
    $.post("addRecord.php",{
        rule_name:rule_name,
    }, function (data, status) {
        $("#add_new_record_modal").modal("hide");
        readRecords();
        $("#rule_name").val("");
    });
}
function readRecords() {
    $.get("readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}



function DeleteRule(id) {
    var conf = confirm("Are you sure, do you really want to delete Rule?");
    if (conf == true) {
        $.post("deleteRule.php", {
                id: id
            },
            function (data, status) {
                // reload Regions by using readRecords();
                readRecords();
            }
        );
    }
}

function GetRuleDetails(id) {
    // Add Rule ID to the hidden field for furture usage
    $("#hidden_rule_id").val(id);
    $.post("readRuleDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var rule = JSON.parse(data);

            // Assing existing values to the modal popup fields
            $("#update_rule_name").val(rule.name);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateRuleDetails() {
    // get values
    var rule_name = $("#update_rule_name").val();
    // get hidden field value
    var id = $("#hidden_rule_id").val();

    // Update the details by requesting to the server using ajax
    $.post("updateRuleDetails.php", {
            id: id,
            rule_name: rule_name
            },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Rule by using readRecords();
            readRecords();
        }
    );
}


$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});
