<!DOCTYPE html>
<html>
<head><title>Register</title>
<meta name="content-type"; charset="UTF-8">
</head><body> 
<div class="content" align="center">  
<div class="header"> <h1>Register</h1> </div> 
<div class="middle"> 
<form action="registeraction.php" method="post"> <table border="0"> 
<tr> <td>Username：</td> 
<td><input type="text" id="id_name" name="username" required="required"></td> 
</tr> <tr>
 <td>Password：</td> <td><input type="password" id="password" name="password" 
required="required"></td> 
</tr> <tr>
 <td>Reprint password：</td> <td><input type="password" id="re_password" 
name="re_password" required="required"></td> </tr> <tr>
 <td>gender：</td> <td> <input type="radio" id="sex" name="sex" value="mam">Male <input type="radio" id="sex" name="sex" value="woman">Female </td> </tr> <tr>
 
<td>Email：</td> <td><input type="email" id="email" name="email" required="required"></td> </tr> <tr> 
<td>Phone number：</td> <td><input type="text" id="phone" name="phone" required="required"></td> </tr> <tr> 
<td>Address：</td> <td><input type="text" id="address" name="address" required="required"></td> </tr> 
<tr> <td colspan="2" align="center" style="color:red;font-size:10px;">  
<?php
$err = isset($_GET["err"]) ? $_GET["err"] : "";
switch ($err) {
    case 1:
        echo "Username is already exist！";
        break;

    case 2:
        echo "Passwords are not the same！";
        break;

    case 3:
        echo "Success！";
        break;
}
?> 
</td> </tr> <tr> <td colspan="2" align="center"> 
<input type="submit" id="register" name="register" value="Register">
 <input type="reset" id="reset" name="reset" value="Reset"> </td></tr> 
 <tr> <td colspan="2" align="center"> 
If you have an account <a href="login.php">Login</a> </td> </tr> </table> </form> </div> 

