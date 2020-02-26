<?php
	header("Content-Type: text/html;charset=utf-8");
	//create connect
	$conn = mysqli_connect('localhost','root','root');
	if($conn){
		//database connect success
		$select = mysqli_select_db($conn,"user_login");		//select database
		if($select){
			//success
			if(isset($_POST["subl"])){
				
				$user = $_POST["username"];
				$pass = $_POST["password"];
				if($user == ""||$pass == ""){
					//empty
					//backtologin
					echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."Cannot be empty"."\"".")".";"."</script>";
					echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."login.html"."\""."</script>";
					exit;
				}
				//sql
				$sql_select = "select username,password from users where username = '$user' and password = '$pass'";
				//
				mysqli_query($conn,'SET NAMES UTF8');
				//
				$ret = mysqli_query($conn,$sql_select);
				$row = mysqli_fetch_array($ret); 
				
				//correct
				if($user == $row['username']&&$pass == $row['password']){
					//jump to success
					 header("Location:loginsucc.php");
				}else{
					//jump to fail
					header("Location:loginfal.php");
				}  
			}
		}
		//close
		mysqli_close($conn);
	}else{		
		//error
		die('Could not connect:'.mysql_error());
	}	
 
?>
