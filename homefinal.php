<?php 
session_start();
include("connection.php");
?>
<html>
<head>
	<title> WordPrint.com</title>
	<link href="home1.css" type="text/css" rel="Stylesheet">

</head>
<body> 

	<div id="pageheader">
		<h1 id="titleheading">WordPrint</h1>
		<h3 id="tagline"> The next biggest blogging network</h3>
	</div>	
<?php 
	if(!isset($_SESSION['uname']))
	{	
?>
<div class="navbar">

  <ul>
        <li><a href="homefinal.php">Newly Posted</a></li>	
		<span class="empty"></span>
		<li><a href="homefinal.php?about">About Us</a></li>
		<span class="empty"></span>
		<li><a href="login.php">Sign in</a></li>
   </ul>
</div>
<?php 
	}
	else
	{
?>
	<div class="navbar">
		<ul> 
			<li><a href="homefinal.php">Newly Posted</a></li>	
			<span class="empty"></span>
			<li><a href="#"><?php echo $_SESSION['uname']; ?>'s Dashboard</a>
			<ul class="dropdown">
                <li><a href="homefinal.php?profile">My Profile</a></li>
                <li><a href="homefinal.php?post">My Posts</a></li>
                <li><a href="homefinal.php?add">Add new Posts</a></li>
            </ul>
			</li>
			<span class="empty"></span>
			<li><a href="logout.php">Logout</a></li>
			

		</ul>
	</div>
	<?php
	}
	?>
	<div id="mainbody">
<?php
	if(isset($_GET['add']))
	{
		include("insert_post.html");
	}
	else if (isset($_GET['about']))
	{
		include("about.php");	
	}
	else if(isset($_GET['post']))
	{
		include("myposts.php");	
	}
	else if (isset($_GET['profile']))
	{
		include("profile.php");	
	}
	
	else
	{
		$query = "select * from userposts order by post_id DESC";
		$run= mysql_query($query);
		while($row=mysql_fetch_array($run)){
				$post_id = $row['post_id']; 
				$title = $row['post_name'];
				$post_author = $row['post_author'];
				$post_content =substr($row['post_content'],0,200);
?>
	<div class="posts">
		<h1><a href="posts.php?id=<?php echo $post_id; ?>"><?php echo $title; ?></a></h1>
			<p id="author">Posted by:<b><?php echo $post_author; ?></b>
			</p>
			<p id="content"><?php echo $post_content; ?></p>
			<p align="right"><a href="posts.php?id=<?php echo $post_id; ?>">Read More...</a></p>
	</div>
	<?php 
			} 
		}
?>
			
</div> 
</body>
</html>
