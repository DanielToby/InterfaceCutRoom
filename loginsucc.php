<!DOCTYPE html>
<html>
<head>
<title>loginsucc</title>
<meta name="content-type";
 charset="UTF-8">
</head>
<body> 
<div> 
<?php

session_start(); 
$username = isset($_SESSION['user']) ? $_SESSION['user'] : ""; 
if (!empty($username)) { ?> 
<h1>Success！</h1> Welcome！
<?php
    echo $username; ?> 
<br/> <a href="login.php">......</a> 
<?php
} else { 
     ?> 
 <h1>No access to visit！！！</h1> 
<?php
} ?> </div>
</body>
</html> 
