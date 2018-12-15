<?php
	require('config/config.php');
	require('config/db.php');

	// Create Query
	$query = 'SELECT * FROM posts ORDER BY created_at DESC';

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
	<div class="container">
		<h1>Posts</h1>	
		<?php foreach($posts as $post) : ?>
			<div class="card mb-2 py-5 bg-light border-success container">
				<a  href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">
				<h3 ><?php echo $post['title']; ?></h3>
				</a>
				<small>Created on <?php echo $post['created_at']; ?> - by : <?php echo $post['author']; ?></small>
				<!-- <p><?php echo $post['body']; ?></p> -->
				<a class="foat-right" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">Read More <i class='fas'>&#xf101;</i></a>
				
			</div>
		<?php endforeach; ?>
	</div>
<?php include('inc/footer.php'); ?>