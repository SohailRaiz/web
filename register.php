<html>
<head>
<link rel="stylesheet" type="css/text" href="style.css"> 
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Live username availability checking using Ajax jQuery PHP and password strength indicator</title>
<script type="text/javascript" src="jquery-1.9.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#username').keyup(function(){ 
        var Username = $(this).val();
        var UsernameAvailResult = $('#username_avail_result'); 
        if(Username.length > 2) { 
            UsernameAvailResult.html('Loading..'); 
            var UrlToPass = 'action=username_availability&username='+Username;
            $.ajax({ 
            type : 'POST',
            data : UrlToPass,
            url  : 'checker.php',
            success: function(responseText){ 
                if(responseText == 0){
                    UsernameAvailResult.html('<span class="success">Username name available</span>');
                }
                else if(responseText > 0){
                    UsernameAvailResult.html('<span class="error">Username already taken</span>');
                }
                else{
                    alert('Problem with sql query');
                }
            }
            });
        }else{
            UsernameAvailResult.html('Enter atleast 3 characters');
        }
        if(Username.length == 0) {
            UsernameAvailResult.html('');
        }
    });
     
    $('#password, #username').keydown(function(e) { 
        if (e.which == 32) {
            return false;
        }
    });
    $('#password').keyup(function() { 
        var PasswordLength = $(this).val().length; 
        var PasswordStrength = $('#password_strength'); 
         
        if(PasswordLength <= 0) { 
            PasswordStrength.html('');
            PasswordStrength.removeClass('normal weak strong verystrong'); 
        }
        if(PasswordLength > 0 && PasswordLength < 4) { 
            PasswordStrength.html('weak');
            PasswordStrength.removeClass('normal strong verystrong').addClass('weak');
        }
        if(PasswordLength > 4 && PasswordLength < 8) { 
            PasswordStrength.html('Normal');
            PasswordStrength.removeClass('weak strong verystrong').addClass('normal');          
        }   
        if(PasswordLength >= 8 && PasswordLength < 12) { 
            PasswordStrength.html('Strong');
            PasswordStrength.removeClass('weak normal verystrong').addClass('strong');
        }
        if(PasswordLength >= 12) { 
            PasswordStrength.html('Very Strong');
            PasswordStrength.removeClass('weak normal strong').addClass('verystrong');
        }
    });
});
</script>
</head>
<body>
<div>
<form method="post" action="register.php">
<fieldset>
<legend> Sign up </legend>
Name: <input type="text" name="fname" placeholder="first name"> <input type="text" name="lname" placeholder="last name"> 
</br>
Email: <input type="text" name="email" placeholder="Email">
</br>
Username: <input type="text" name="uname" id="username" placeholder="Your visible name">
<div class="username_avail_result" id="username_avail_result"></div>
</br>
Password: <input type="text" name="pass" placeholder="password" id="password">
<div class="password_strength" id="password_strength"></div>
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


