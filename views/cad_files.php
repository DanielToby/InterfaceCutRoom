<?php require_once "header.php"; ?>
    <div id="container">
    <div style="text-align: right; margin: 20px 0px 10px;">
        <a id="btnAddAction" href="index.php?action=cad_file-add"><img src="views/image/icon-add.png" />New CAD File</a>
    </div>
    <div id="toys-grid" class="shadow-sm">
        <?php 
        if (empty($result)) { 
            echo "<p style='text-align: center;'><em>No CAD files were found in the database.</em></p>";
        } else { 
        ?>
        <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th>CAD File ID</th>
                    <th>Total Piece Perimeters</th>
                    <th>Total Number of Pieces</th>
                    <th>Total Cut Length</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $k => $v) {
                            ?>
          <tr>
                    <td><?php echo $result[$k]["id"]; ?></td>
                    <td><?php echo $result[$k]["TCP1"]; ?></td>
                    <td><?php echo $result[$k]["TCP2"]; ?></td>
                    <td><?php echo $result[$k]["TCL"]; ?></td>
                    <td><a class="btnReadAction" 
                        href="index.php?action=cad_file-read&id=<?php echo $result[$k]["id"]; ?>">
                        <span class="fas fa-info"></span>
                        </a>
                        <a class="btnEditAction"
                        href="index.php?action=cad_file-edit&id=<?php echo $result[$k]["id"]; ?>">
                        <span class="fas fa-pen"></span>
                        </a>
                        <a class="btnDeleteAction" 
                        href="index.php?action=cad_file-delete&id=<?php echo $result[$k]["id"]; ?>">
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
        <?php
        }
        ?>
    </div>
    </div>
</body>
</html>