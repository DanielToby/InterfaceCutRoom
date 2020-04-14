<?php

$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$remember = isset($_POST['remember']) ? $_POST['remember'] : ""; 
if (!empty($username) && !empty($password)) { 
    $conn = mysqli_connect('localhost', '', '', 'user'); 
    $sql_select = "SELECT username,password FROM usertext WHERE username = '$username' AND password = '$password'"; 
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    if ($username == $row['username'] && $password == $row['password']) 
    { 
        if ($remember == "on") 
        {
            setcookie("", $username, time() + 7 * 24 * 3600);
        } 
        session_start(); 
        $_SESSION['user'] = $username; 
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:m:s');
        $info = sprintf("当前访问用户：%s,IP地址：%s,时间：%s /n", $username, $ip, $date);
        $sql_logs = "INSERT INTO logs(username,ip,date) VALUES('$username','$ip','$date')";
        
        $f = fopen('./logs/' . date('Ymd') . '.log', 'a+');
        fwrite($f, $info);
        fclose($f); 
        header("Location:loginsucc.php"); 
        mysqli_close($conn);
    }
    else 
    { 
        
        header("Location:login.php?err=1");
    }
} else { 
    header("Location:login.php?err=2");
} ?>
