<?php
		include("connection.php");

$query = "select * from userposts where post_author='".$_SESSION['uname']."' order by rand() LIMIT 0,4";

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
