<?php 
session_start();

if(!isset($_SESSION['uname'])){

header("location: login.php");
}
else {

?>


<html>
	<head>
		<title>Add new posts</title>
	</head>
	
<body>
<form method="post" action="insert_post.php" ">
	
	<table width="600" align="center" border="10">
		
		<tr>
			<td align="center" colspan="6">
				<h1>Add new posts</h1>
			</td>
		</tr>
		<tr>
			<td align="right">Post Name:</td>
			<td><input type="text" name="title" size="30"></td>
		</tr>
		<tr>
			<td align="right">Post Content:</td>
			<td><textarea name="content" cols="45" rows="25"></textarea></td>
		</tr>
		<tr>
			<td align="center" colspan="6"><input type="submit" name="submit" value="Publish"></td>
		</tr>

</form>
</body>
</html>
<?php 
include("connection.php"); 

if(isset($_POST['submit'])){

	  $title = $_POST['title'];
	  $author = $_SESSION['uname'];
	  $content = $_POST['content'];
	
		$insert= "insert into userposts (post_name,post_author,post_content) values ('$title','$author','$content')";
	
	if(mysql_query($insert)){
	
	echo "<script>alert('your post has been published successfully')</script>";
	echo "<script>window.open('home.php','_self')</script>";
	
	}
	else{
		echo "<script>alert('There was some error in publishing your post')</script>";
		echo "<script>window.open('insert_post.php','_self')</script>";
	}
}
}

?>
