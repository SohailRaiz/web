<?php 
session_start();
?>

<html>
<head>
  <link rel="stylesheet" type="css/text" href="style.css"> 
<body>
  <form method="post" action="login.php">
    <fieldset>
      <legend>Log In!!</legend>
      Username: <input type="text" name="uname" placeholder="username or email"> 
      </br>
      Password: <input type="password" name="pass" placeholder="password">
      </br>

      <input id="submit" type="submit" name="login" value="log in!"> 
      <p>Not a member yet?<a href="register.html"> Register</a></p>
    </fieldset>
  </form>
</body>
</html>
