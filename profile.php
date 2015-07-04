<?php 
session_start();

include("connection.php");

$query = "select * from userdata where uname='".$_SESSION['uname']."' ";
$run= mysql_query($query);
while($row=mysql_fetch_array($run))
{
	$fname=$_POST['fname'];
	$lname= $_POST['lname'];
	$Email=$_POST['email'];
	$uname=$_POST['uname'];
	$password=$_POST['pass'];
	$DOB=$_POST['dob'];
?>
<div id="profiledata">
<fieldset>
<legend> Your Profile data </legend>
Name: <?php echo $fname?>
</br>
Email: <?php echo $email; ?>
</br>
Username: <?php echo $uname; ?>
</br>
Password: <?php echo "$password"; ?>
</br>
DOB <?php echo $DOB; ?>
</br>

<input type="button" name="edit" value="Edit info!!">
</fieldset>


</div> 	
<?php
}
?>
