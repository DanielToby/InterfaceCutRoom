<?php require_once "header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    
    <div>
        <label style="padding-top: 20px;">Table A Length (inches)</label> <span
            id="table_a_length-info" class="info"></span><br /> <input type="text"
            name="table_a_length" id="table_a_length" class="demoInputBox"
            value="<?php echo $result[0]["table_a_length"]; ?>">
    </div>
    <div>
        <label style="padding-top: 20px;">Table A Width (inches)</label> <span
            id="table_a_width-info" class="info"></span><br /> <input type="text"
            name="table_a_width" id="table_a_width" class="demoInputBox"
            value="<?php echo $result[0]["table_a_width"]; ?>">
    </div>
    <div>
        <label style="padding-top: 20px;">Table B Length (inches)</label> <span
            id="table_b_length-info" class="info"></span><br /> <input type="text"
            name="table_b_length" id="table_b_length" class="demoInputBox"
            value="<?php echo $result[0]["table_b_length"]; ?>">
    </div>
    <div>
        <label style="padding-top: 20px;">Table B Width (inches)</label> <span
            id="table_b_width-info" class="info"></span><br /> <input type="text"
            name="table_b_width" id="table_b_width" class="demoInputBox"
            value="<?php echo $result[0]["table_b_width"]; ?>">
    </div>
    <h2>Machinery Data</h2>
    <div>
        <label>Time Remaining in Table Pair (minutes)</label> <span id="time_remaining_table_pair-info"
            class="info"></span><br /> <input type="text"
            name="time_remaining_table_pair" id="time_remaining_table_pair" class="demoInputBox"
            value="<?php echo $result[0]["time_remaining_table_pair"]; ?>">
    </div>
    <div>
        <label>Cutter Position</label> <span id="cutter_position-info"
            class="info"></span><br /> <input type="text"
            name="cutter_position" id="cutter_position" class="demoInputBox"
            value="<?php echo $result[0]["cutter_position"]; ?>">
    </div>
    <div>
        <label>Cutting Speed of Cutting Head (inches / min)</label> <span id="cs-info"
            class="info"></span><br /> <input type="text"
            name="cs" id="cs" class="demoInputBox"
            value="<?php echo $result[0]["CS"]; ?>">
    </div>
    <div>
        <label>Move Time of Cutting Head Between Pieces (minutes)</label> <span id="pmt-info"
            class="info"></span><br /> <input type="text"
            name="pmt" id="pmt" class="demoInputBox"
            value="<?php echo $result[0]["PMT"]; ?>">
    </div>
    <div>
        <label>Cut Head Linear Travel Ability (inches)</label> <span id="clt-info"
            class="info"></span><br /> <input type="text"
            name="clt" id="clt" class="demoInputBox"
            value="<?php echo $result[0]["CLT"]; ?>">
    </div>
    <div>
        <label>Conveyor Speed (inches / minute)</label> <span id="cv-info"
            class="info"></span><br /> <input type="text"
            name="cv" id="cv" class="demoInputBox"
            value="<?php echo $result[0]["CV"]; ?>">
    </div>
    <div>
        <label>Setup Time per CLT Movement</label> <span id="clts-info"
            class="info"></span><br /> <input type="text"
            name="clts" id="clts" class="demoInputBox"
            value="<?php echo $result[0]["CLTS"]; ?>">
    </div>
    <div>
        <label>Spreading Speed (yards / minute)</label> <span id="ss-info"
            class="info"></span><br /> <input type="text"
            name="ss" id="ss" class="demoInputBox"
            value="<?php echo $result[0]["SS"]; ?>">
    </div>
    <div>
        <label>Spreader Travel (yards / minute)</label> <span id="st-info"
            class="info"></span><br /> <input type="text"
            name="st" id="st" class="demoInputBox"
            value="<?php echo $result[0]["ST"]; ?>">
    </div>
    <div>
        <label>Minutes per Carriage Rotation</label> <span id="crt-info"
            class="info"></span><br /> <input type="text"
            name="crt" id="crt" class="demoInputBox"
            value="<?php echo $result[0]["CRT"]; ?>">
    </div>
    <h2>Operational Data</h2>
    <div>
        <label>Cut Setup Time (minutes)</label> <span id="cst-info"
            class="info"></span><br /> <input type="text"
            name="cst" id="cst" class="demoInputBox"
            value="<?php echo $result[0]["CST"]; ?>">
    </div>
    <div>
        <label>Operational Efficiency Factor (Between 0 and 1)</label> <span id="oef-info"
            class="info"></span><br /> <input type="text"
            name="oef" id="oef" class="demoInputBox"
            value="<?php echo $result[0]["OEF"]; ?>">
    </div>
    <div>
        <label>Minutes to Deploy Marker to Table</label> <span id="pst-info"
            class="info"></span><br /> <input type="text"
            name="pst" id="pst" class="demoInputBox"
            value="<?php echo $result[0]["PST"]; ?>">
    </div>
    <div>
        <label>Minutes per Marker to Mark Splice Points</label> <span id="mst-info"
            class="info"></span><br /> <input type="text"
            name="mst" id="mst" class="demoInputBox"
            value="<?php echo $result[0]["MST"]; ?>">
    </div>
    <div>
        <label>Minutes to Load Roll</label> <span id="mlr-info"
            class="info"></span><br /> <input type="text"
            name="mlr" id="mlr" class="demoInputBox"
            value="<?php echo $result[0]["MLR"]; ?>">
    </div>
    <div>
        <label>Minutes to Cut Out or Mark Defect</label> <span id="dt-info"
            class="info"></span><br /> <input type="text"
            name="dt" id="dt" class="demoInputBox"
            value="<?php echo $result[0]["DT"]; ?>">
    </div>
    <div>
        <label>Minutes to Adjust Spreading Machine and Stops</label> <span id="ssa-info"
            class="info"></span><br /> <input type="text"
            name="ssa" id="ssa" class="demoInputBox"
            value="<?php echo $result[0]["SSA"]; ?>">
    </div>
    <div>
        <label>Number of Defects per Yard</label> <span id="dy-info"
            class="info"></span><br /> <input type="text"
            name="dy" id="dy" class="demoInputBox"
            value="<?php echo $result[0]["DY"]; ?>">
    </div>
    <div>
        <label>Spreader Travel Yards Factor (0 = bidirectional, 1 = single direction)</label> <span id="STF-info"
            class="info"></span><br /> <input type="text"
            name="stf" id="stf" class="demoInputBox"
            value="<?php echo $result[0]["STF"]; ?>">
    </div>
    <div>
        <label>Carriage Rotation Factor</label> <span id="crf-info"
            class="info"></span><br /> <input type="text"
            name="crf" id="crf" class="demoInputBox"
            value="<?php echo $result[0]["CRF"]; ?>">
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
    
    if(!$("#table_a_length").val()) {
        $("#table_a_length-info").html("(required)");
        $("#table_a_length").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#table_a_width").val()) {
        $("#table_a_width-info").html("(required)");
        $("#table_a_width").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#table_b_length").val()) {
        $("#table_b_length-info").html("(required)");
        $("#table_b_length").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#time_remaining_table_pair").val()) {
        $("#time_remaining_table_pair-info").html("(required)");
        $("#time_remaining_table_pair").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#cutter_position").val()) {
        $("#cutter_position-info").html("(required)");
        $("#cutter_position").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#cs").val()) {
        $("#cs-info").html("(required)");
        $("#cs").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#pmt").val()) {
        $("#pmt-info").html("(required)");
        $("#pmt").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#clt").val()) {
        $("#clt-info").html("(required)");
        $("#clt").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#cv").val()) {
        $("#cv-info").html("(required)");
        $("#cv").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#clts").val()) {
        $("#clts-info").html("(required)");
        $("#clts").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#ss").val()) {
        $("#ss-info").html("(required)");
        $("#ss").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#st").val()) {
        $("#st-info").html("(required)");
        $("#st").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#crt").val()) {
        $("#crt-info").html("(required)");
        $("#crt").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#cst").val()) {
        $("#cst-info").html("(required)");
        $("#cst").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#oef").val()) {
        $("#oef-info").html("(required)");
        $("#oef").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#cs").val()) {
        $("#cs-info").html("(required)");
        $("#cs").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#pst").val()) {
        $("#pst-info").html("(required)");
        $("#pst").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#mst").val()) {
        $("#mst-info").html("(required)");
        $("#mst").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#mlr").val()) {
        $("#mlr-info").html("(required)");
        $("#mlr").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#dt").val()) {
        $("#dt-info").html("(required)");
        $("#dt").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#ssa").val()) {
        $("#ssa-info").html("(required)");
        $("#ssa").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#dy").val()) {
        $("#dy-info").html("(required)");
        $("#dy").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#stf").val()) {
        $("#stf-info").html("(required)");
        $("#stf").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#crf").val()) {
        $("#crf-info").html("(required)");
        $("#crf").css('background-color','#FFFFDF');
        valid = false;
    }

    return valid;
}
</script>
</body>
</html>