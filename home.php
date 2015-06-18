<?php 
session_start();
?>

<html>
<head>
	<title> wordPrint-The next biggest bloging site</title>
	<link href="home.css" type="text/css" rel="Stylesheet">
</head>

<body>
<div id=header>
<h1>WordPrint</h1>
<h4> The next biggest blogging site <h4>
</div>
<div id=nav> 
	<ul>
	
		<?php 
			if(!isset($_SESSION['uname']))
			{
		?>
			<li><a href=home.php>Home</a></li>
			<li><a href=#>All Posts</a></li>
			<li><a href=#>About Us</a></li>
			<li><a href=#>Contact Us</a></li>
			<li><a href="login.php">Log In</a></li>
			<li><a href="register.php">Sign Up</a></li>
		<?php 
			}
			else
			{
		?>
			<li><a href=home.php>Home</a></li>
			<li><a href=#>All Posts</a></li>
			<li><a href="insert_post.php">Add new Post</a></li>
			<li id="userwelcome"> Welcome <?php echo $_SESSION['uname']; ?></li>
			<li><a href="logout.php">Logout</a></li>
		<?php
			}
		?>
	</ul>
</div>

<div id="mainbody">

<?php 

include("connection.php");

$query = "select * from userposts order by rand() LIMIT 0,4";

$run= mysql_query($query);

while($row=mysql_fetch_array($run)){

	$post_id = $row['post_id']; 
	$title = $row['post_name'];
	$post_author = $row['post_author'];
	$post_content =$row['post_content'];
?>

<h1>
 <?php echo $title; ?>
</h1>

<p id="author">Posted by:<b><?php echo $post_author; ?></b>
</p>

<p id="content"><?php echo $post_content; ?></p>

<hr>

<?php 
} 
?>
</div>



</div> 


		





</body>
</html>
