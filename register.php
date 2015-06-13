
<?php


if(isset($_POST['submit'])){
$con = mysql_connect("localhost" ,"root" , "");
if(!$con)
{
die('could not connect'.mysql_error());
}
mysql_select_db("web" , $con);

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
echo "<script>alert('You have been Registered!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	
		
mysql_close($con);
}
?>


