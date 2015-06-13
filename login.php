
<?php 
$conn = mysql_connect("localhost","root","");

$db = mysql_select_db('web',$conn);


if(isset($_POST['login'])){
	
	$user_name =($_POST['uname']);
	$user_pass = ($_POST['pass']);
	
	$query = "select * from userdata where (uname='$user_name' OR email='$user_name') AND password='$user_pass'";

	$run = mysql_query($query); 
	
	if(mysql_num_rows($run)>0)
	{
	
	$_SESSION['uname']=$user_name;
	
	echo "<script>window.open('index.php','_self')</script>";
	}
	else {
	
	echo "<script>alert('User name or password is incorrect')</script>";
	
	}
}


?>
