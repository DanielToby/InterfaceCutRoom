<?php require_once "header.php"; ?>
    <div class="container">
        <div class="page-header">
            <h2>Scheduling Engine</h2>
            <h3>Calculating Cut and Spread Times...</h3>
            <?php foreach($times as $time) {
                echo $time;
                echo "</br>";
            } ?>
        </div>
    </div>
</body>
</html>