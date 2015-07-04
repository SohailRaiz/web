<?php
include 'connection.php'; 
if(isset($_POST['action']) && $_POST['action'] == 'username_availability'){ 
    $username       = htmlentities($_POST['username']); // Get the username values
    $check_query    = mysql_query('SELECT uname FROM users WHERE uname = "'.$username.'" '); 
    echo mysql_num_rows($check_query); 
}
?>
