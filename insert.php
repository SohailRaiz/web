<?php
if(isset($_POST['submit'])){

	  $title = $_POST['title'];
	  $author = $_SESSION['uname'];
	  $content = $_POST['content'];
	
		$insert= "insert into userposts (post_name,post_author,post_content) values ('$title','$author','$content')";
	
	if(mysql_query($insert)){
	
	echo "<script>alert('your post has been published successfully')</script>";
	//echo "<script>window.open('home.php','_self')</script>";
	
	}
	else{
		echo "<script>alert('There was some error in publishing your post')</script>";
	//	echo "<script>window.open('insert_post.php','_self')</script>";
	}
}
?>
