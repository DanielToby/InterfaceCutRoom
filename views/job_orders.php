<?php require_once "header.php"; ?>
<div id="container">
    <div style="text-align: right; margin: 20px 0px 10px;">
        <a id="btnAddAction" href="index.php?action=job_order-add"><img src="views/image/icon-add.png" />New Order</a>
    </div>
    <form name="frmSchedule" method="post" action="" id="frmSchedule" onSubmit="return validate();">
        <div id="toys-grid" class="shadow-sm">
            <?php
            if (empty($result)) {
                echo "<p style='text-align: center;'><em>No orders were found in the database.</em></p>";
            } else {
            ?>
                <table cellpadding="10" cellspacing="1">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Due Date</th>
                            <th>Priority</th>
                            <th>Schedule</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($result)) {
                            foreach ($result as $k => $v) {
                        ?>
                                <tr>
                                    <td><?php echo $result[$k]["id"]; ?></td>
                                    <td><?php echo $result[$k]["due_date"]; ?></td>
                                    <td><?php echo $result[$k]["user_priority"]; ?></td>
                                    <td><input type="checkbox" name="scheduled[]" value=<?php echo $result[$k]["id"]; ?>></td>
                                    <td><a class="btnReadAction" href="index.php?action=job_order-read&id=<?php echo $result[$k]["id"]; ?>">
                                            <span class="fas fa-info"></span>
                                        </a>
                                        <a class="btnEditAction" href="index.php?action=job_order-edit&id=<?php echo $result[$k]["id"]; ?>">
                                            <span class="fas fa-pen"></span>
                                        </a>
                                        <a class="btnDeleteAction" href="index.php?action=job_order-delete&id=<?php echo $result[$k]["id"]; ?>">
                                            <span class="fas fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    <tbody>
                </table>
            <?php } ?>
        </div>
        <div>
            <input type="submit" name="submit" id="btnSchedule" value="Submit to Scheduling Engine" />
        </div>
    </form>
</div>

<script>
    function validate() {
        var valid = true;

        return valid;
    }
</script>

</body>

</html>