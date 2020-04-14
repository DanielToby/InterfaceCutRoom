<!DOCTYPE html>
<html><head>
<title>login</title>
<meta name="content-type"; charset="UTF-8">
</head><body> 
<div class="content" align="center"> 
 <div class="header"> <h1>Login</h1> </div> 
<!--中部--> 
<div class="middle">
 <form id="loginform" action="loginaction.php" method="post"> 
<table border="0"> <tr> 
    <td>Username：</td> 
<td> <input type="text" id="name" name="username" 
required="required" value="<?php
echo isset($_COOKIE[""]) ? $_COOKIE[""] : ""; ?>"> </td> </tr> 
<tr> <td>Password：</td> <td><input type="password" id="password" name="password"></td> 
</tr> <tr> <td colspan="2"> <input type="checkbox" name="remember"><small>Remember me </td> </tr> <tr> <td 
colspan="2" align="center" style="color:red;font-size:10px;">
<?php
$err = isset($_GET["err"]) ? $_GET["err"] : "";
switch ($err) {
    case 1:
        echo "Username or Password is wrong";
        break;

    case 2:
        echo "Usesrname and Password cannot be empty！";
        break;
} ?> </td> </tr> <tr> <td colspan="2" align="center"> 
<input type="submit" id="login" name="login" value="login"> <input type="reset" id="reset" 
name="reset" value="reset"> </td> </tr> 
<tr> 
    <td colspan="2" align="center"> Have no account yet,<a href="register.php">Register</a></td>
</tr> 
</table> 
</form> 
</div> 

<div class="footer"> <small>Copyright &copy; </div> </div>
</body>
</html>     
