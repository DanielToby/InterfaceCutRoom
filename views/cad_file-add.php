<?php require_once "header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label>Sum of Piece Perimeters</label> <span id="tcp1-info"
            class="info"></span><br /> <input type="text"
            name="tcp1" id="tcp1" class="demoInputBox">
    </div>
    <div>
        <label>Total Number of Pieces</label> <span id="tcp2-info"
            class="info"></span><br /> <input type="text"
            name="tcp2" id="tcp2" class="demoInputBox">
    </div>
    <div>
        <label>Linear Cut Length (inches)</label> <span id="tcl-info"
            class="info"></span><br /> <input type="text"
            name="tcl" id="tcl" class="demoInputBox">
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

    if(!$("#tcp1").val()) {
        $("#tcp1-info").html("(required)");
        $("#tcp1").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#tcp2").val()) {
        $("#tcp2-info").html("(required)");
        $("#tcp2").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#tcl").val()) {
        $("#tcl-info").html("(required)");
        $("#tcl").css('background-color','#FFFFDF');
        valid = false;
    }      
    return valid;
}
</script>
</body>
</html>