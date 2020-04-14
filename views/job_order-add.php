<?php require_once "header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label>Due Date</label> <span id="due_date-info" class="info"></span><br />
        <input type="date" name="due_date" id="due_date" class="demoInputBox">
    </div>
    <div>
        <label>Order Priority</label> <span id="user_priority-info"
            class="info"></span><br /> <input type="text"
            name="user_priority" id="user_priority" class="demoInputBox">
    </div>
    <div>
        <label>Number of Markers</label> <span id="nm-info"
            class="info"></span><br /> <input type="text"
            name="nm" id="nm" class="demoInputBox">
    </div>
    <div>
        <label>Number of Rolls</label> <span id="tnr-info"
            class="info"></span><br /> <input type="text"
            name="tnr" id="tnr" class="demoInputBox">
    </div>
    <div>
        <label>Total Cut Length (yards)</label> <span id="tcy-info"
            class="info"></span><br /> <input type="text"
            name="tcy" id="tcy" class="demoInputBox">
    </div>
    <div>
        <input type="submit" name="add" id="btnSubmit" value="Add" />
    </div>
    </div>
</form>
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