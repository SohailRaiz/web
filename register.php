<html>
<head>
<link rel="stylesheet" type="css/text" href="style.css"> 
<body>
<div>
<form method="post" action="register.php">
<fieldset>
<legend> Sign up </legend>
Name: <input type="text" name="fname" placeholder="first name"> <input type="text" name="lname" placeholder="last name"> 
</br>
Email: <input type="text" name="email" placeholder="Email">
</br>
Username: <input type="text" name="uname" placeholder="Your visible name">
</br>
Password: <input type="text" name="pass" placeholder="password">
</br>
DOB <input type="date" name="dob">
</br>

<input id="submit" type="submit" name="submit" value="Sign Up!!">
</fieldset>



</form>
</div>
</body>
</html>

<?php


if(isset($_POST['submit'])){
include("connection.php");

$fname=$_POST['fname'];
$lname= $_POST['lname'];
$Email=$_POST['email'];
$uname=$_POST['uname'];
$password=$_POST['pass'];
$DOB=$_POST['dob'];


$sql= "insert into userdata(fname,lname,uname,email,password,DOB) 
Values ('$fname','$lname','$uname','$Email','$password','$DOB')";

if(!mysql_query($sql, $con))
{
die('Error' . mysql_error());
}
echo "<script>alert('you have been added!')</script>";
		echo "<script>window.open('home.php','_self')</script>";
	
		
mysql_close($con);
}
?>


