<?php 
include("connection.php");
if(isset($_GET['id'])){

$p_id = $_GET['id'];

	$query= "select * from userposts where post_id='$p_id'";

$run= mysql_query($query);

while($row=mysql_fetch_array($run)){

	$post_id = $row['post_id']; 
	$title = $row['post_name'];
	$post_author = $row['post_author'];
	$post_content =$row['post_content'];
?>

<h2>
<a href="posts.php?id=<?php echo $post_id; ?>">

<?php echo $title; ?>

</a>

</h2>

<p align="right">Posted by:&nbsp;&nbsp;<b><?php echo $post_author; ?></b></p>

<p align="justify"><?php echo $post_content; ?></p>


<?php } }?>





