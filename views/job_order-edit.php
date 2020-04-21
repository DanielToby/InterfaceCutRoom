<?php require_once "header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label>Due Date</label> <span id="due_date-info" class="info"></span><br />
        <input type="text" name="due_date" id="due_date" class="demoInputBox"
            value="<?php echo $result[0]["due_date"]; ?>">
    </div>
    <div>
        <label>Associated CAD File ID</label> <span id="cadfile_id-info"
            class="info"></span><br /> <input type="text"
            name="cadfile_id" id="cadfile_id" class="demoInputBox"
            value="<?php echo $result[0]["cadfile_id"]; ?>">
    </div>
    <div>
        <label>User Priority</label> <span id="user_priority-info"
            class="info"></span><br /> <input type="text"
            name="user_priority" id="user_priority" class="demoInputBox"
            value="<?php echo $result[0]["user_priority"]; ?>">
    </div>
    <div>
        <label style="padding-top: 20px;">Number of Markers</label> <span
            id="nm-info" class="info"></span><br /> <input type="text"
            name="nm" id="nm" class="demoInputBox"
            value="<?php echo $result[0]["NM"]; ?>">
    </div>
    <div>
        <label style="padding-top: 20px;">Number of Rolls</label> <span
            id="tnr-info" class="info"></span><br /> <input type="text"
            name="tnr" id="tnr" class="demoInputBox"
            value="<?php echo $result[0]["TNR"]; ?>">
    </div>
    <div>
        <label style="padding-top: 20px;">Total Cut Length (yards)</label> <span
            id="tcy-info" class="info"></span><br /> <input type="text"
            name="tcy" id="tcy" class="demoInputBox"
            value="<?php echo $result[0]["TCY"]; ?>">
    </div>
    <div>
        <input type="submit" name="add" id="btnSubmit" value="Save" />
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
    <script>
        
function validate() {
    var valid = true;   
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#due_date").val()) {
        $("#due_date-info").html("(required)");
        $("#due_date").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#cadfile_id").val()) {
        $("#cadfile_id-info").html("(required)");
        $("#cadfile_id").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#user_priority").val()) {
        $("#user_priority-info").html("(required)");
        $("#user_priority").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#nm").val()) {
        $("#nm-info").html("(required)");
        $("#nm").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#tnr").val()) {
        $("#tnr-info").html("(required)");
        $("#tnr").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#tcy").val()) {
        $("#tcy-info").html("(required)");
        $("#tcy").css('background-color','#FFFFDF');
        valid = false;
    }

    return valid;
}
</script>
    </body>
    </html>