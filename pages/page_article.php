<?php
$article = mysqli_real_escape_string($DB, $_GET['article']);

$query = 'SELECT article.id AS id, user.id, article.created_at, user.name, article.title, article.text
	FROM article, user
	WHERE article.id=\'' . $article . '\'
	AND article.created_by = user.id';

$result = mysqli_query($DB, $query);
$row = mysqli_fetch_assoc($result);
$date = date('H:i Y-m-d', strtotime($row['created_at']));
?>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h2 class="card-title"><?php echo $row['title']; ?></h2>
				<hr>
				<small>Created by <?php echo $row['name']; ?> at <?php echo $date; ?></small>
				<p class="card-text"><?php echo $row['text']; ?></p>
				<a class="btn btn-primary" href="index.php" role="button">Back</a>
			</div>
		</div>
	</div>
</div>
