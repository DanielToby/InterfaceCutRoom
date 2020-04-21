<?php require_once "header.php"; ?>
<div class="container">
    <div class="page-header">
        <h2>Scheduling Engine</h2>
        <hr>
        <p>Calculating Cut and Spread Times...</p>
        <?php foreach ($times as $time) {
            echo $time;
            echo "</br>";
        } ?>

        <hr>
        <p>Generating schedule, sorting by <strong>due date,</strong> then <strong>user priority,</strong> then <strong> total direct time (cut time + spread time) </strong> ...</p>
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
                            <th>Total Direct Time</th>
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
                                    <td><?php echo round($result[$k]["total_direct_time"], 2); ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    <tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
</body>

</html>