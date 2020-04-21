<?php require_once "header.php"; ?>
    <div class="container">
        <div class="page-header">
            <h1>CAD File Details</h1>
        </div>
        <div class="form-group">
            <label>ID</label>
            <p class="form-control-static"><?php echo $result[0]["id"]; ?></p>
        </div>
        <div class="form-group">
            <label>Sum of Piece Perimeters</label>
            <p class="form-control-static"><?php echo $result[0]["TCP1"]; ?></p>
        </div>
        <div class="form-group">
            <label>Total Number of Pieces</label>
            <p class="form-control-static"><?php echo $result[0]["TCP2"]; ?></p>
        </div>
        <div class="form-group">
            <label>Linear Length of Cut</label>
            <p class="form-control-static"><?php echo $result[0]["TCL"]; ?></p>
        </div>
    </div>
</body>
</html>