<?php require_once "header.php"; ?>
    <div class="container">
        <div class="page-header">
            <h1>Order Details</h1>
        </div>
        <div class="form-group">
            <label>ID</label>
            <p class="form-control-static"><?php echo $result[0]["id"]; ?></p>
        </div>
        <div class="form-group">
            <label>Due Date</label>
            <p class="form-control-static"><?php echo $result[0]["due_date"]; ?></p>
        </div>
        <div class="form-group">
            <label>Priority (by user input)</label>
            <p class="form-control-static"><?php echo $result[0]["user_priority"]; ?></p>
        </div>
        <div class="form-group">
            <label>Priority (by algorithm)</label>
            <p class="form-control-static"><?php echo $result[0]["generated_priority"]; ?></p>
        </div>
        <div class="form-group">
            <label>Estimated Spread Time</label>
            <p class="form-control-static"><?php echo $result[0]["spread_time"]; ?></p>
        </div>
        <div class="form-group">
            <label>Estimated Cut Time</label>
            <p class="form-control-static"><?php echo $result[0]["cut_time"]; ?></p>
        </div>
        <div class="form-group">
            <label>Allowable Tables</label>
            <p class="form-control-static"><?php echo $result[0]["allowable_table_ids"]; ?></p>
        </div>
        <div class="form-group">
            <label>Preference</label>
            <p class="form-control-static"><?php echo $result[0]["pref"]; ?></p>
        </div>
        <div class="form-group">
            <label>Scheduled</label>
            <p class="form-control-static"><?php echo $result[0]["scheduled"]; ?></p>
        </div>
        <div class="form-group">
            <label>Job Completed</label>
            <p class="form-control-static"><?php echo $result[0]["job_completed"]; ?></p>
        </div>
        <div class="form-group">
            <label>Associated CAD file</label>
            <p class="form-control-static"><?php echo $result[0]["cadfile_id"]; ?></p>
        </div>
        <div class="form-group">
            <label>Number of markers</label>
            <p class="form-control-static"><?php echo $result[0]["NM"]; ?></p>
        </div>
        <div class="form-group">
            <label>Number of rolls</label>
            <p class="form-control-static"><?php echo $result[0]["TNR"]; ?></p>
        </div>
        <div class="form-group">
            <label>Total cut length (yards)</label>
            <p class="form-control-static"><?php echo $result[0]["TCY"]; ?></p>
        </div>
    </div>
</body>
</html>