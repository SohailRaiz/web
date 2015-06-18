<?php 
session_start();
if(isset($_SESSION['uname'])){

header("location: home.php");
}
else {
if(isset($_POST['login']))
{
	if(isset($_POST['rem'])){
		setcookie("uname",$_POST["uname"],time() + (86400 * 30),"/");
		setcookie("pass",$_POST["pass"],time() + (86400 * 30),"/");
	}
	
}
?>

<html>
<head>
<link rel="stylesheet" type="css/text" href="style.css"> 
<body>
<div>
<form method="post" action="login.php">
<fieldset>
<legend>Log In!!</legend>
Username: <input type="text" name="uname" placeholder="username or email"> 
</br>
Password: <input type="password" name="pass" placeholder="password">
</br>

<input id="submit" type="submit" name="login" value="log in!"> 
<input type="checkbox" name="rem"> Remember Me!<br>
<p>Not a member yet?<a href="register.html"> Register</a></p>
</fieldset>



</form>
</div>
</body>
</html>

<?php 

if(isset($_POST['login']))
/*{
	if(isset($_POST['rem'])){
		("username",$_POST["uname"],time() + (86400 * 30),"/");
		setcookie("pasword",$_POST["pass"],time() + (86400 * 30),"/");
	}
}*/


include("connection.php");


if(isset($_POST['login'])){
	
	$user_name =($_POST['uname']);
	$user_pass = ($_POST['pass']);
	
	$query = "select * from userdata where (uname='$user_name' OR email='$user_name') AND password='$user_pass'";

	$run = mysql_query($query); 
	
	if(mysql_num_rows($run)>0)
	{
	
	$_SESSION['uname']=$user_name;
	
	echo "<script>window.open('home.php','_self')</script>";
	}
	else {
	
	echo "<script>alert('User name or password is incorrect')</script>";
	
	}
}
}

?>


