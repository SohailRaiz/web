
<?php 
session_start();

include("connection.php");

$query = "select * from userposts where post_author='".$_SESSION['uname']."' order by post_id DESC";

$run= mysql_query($query);

while($row=mysql_fetch_array($run)){

	$post_id = $row['post_id']; 
	$title = $row['post_name'];
	$post_author = $row['post_author'];
	$post_content =$row['post_content'];
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




?>
