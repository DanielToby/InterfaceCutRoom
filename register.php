<?php
	header("Content-Type: text/html;charset=utf-8");
	//connect
	$conn = mysqli_connect('localhost','root','root');
	if($conn){
		//success
		$select = mysqli_select_db($conn,"user_login");		//select
		if(isset($_POST["subr"])){
			
			$user = $_POST["username"];
			$pass = $_POST["password"];
			$re_pass = $_POST["re_password"];
			
			if($user == ""||$pass == ""){
				
				echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."Username and passwords cannot be empty！"."\"".")".";"."</script>";
				echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";
				exit;
			}
			if($pass == $re_pass){
				
				mysqli_set_charset($conn,'utf8');	
				
				//sql
				$sql_select = "select username from users where username = '$user'";
				
				$result = mysqli_query($conn,$sql_select);
				
				$num = mysqli_num_rows($result); 
				
				if($num){
					
					echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."Usename exist！"."\"".")".";"."</script>";
					echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";
					exit;
				}else{
					
					$sql_insert = "insert into users(username,password) values('$user','$pass')";
					
					$ret = mysqli_query($conn,$sql_insert);
					$row = mysqli_fetch_array($ret); 
					
					header("Location:registersucc.php");
				}
			}else{
				
				echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."password not same！"."\"".")".";"."</script>";
				echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";
				exit;
			}
		}
		
		mysqli_close($conn);
	}else{
		
		die('Could not connect:'.mysql_error());
	}
 
?>
