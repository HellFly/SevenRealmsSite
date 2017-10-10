<?php
$query = 'SELECT article.id AS id, user.id, article.created_at, user.name, article.title, article.text
	FROM article, user
	WHERE article.created_by = user.id
	ORDER BY article.created_at DESC';
$result = mysqli_query($DB, $query);
?>

<div class="row">
	<?php
	while ($row = mysqli_fetch_assoc($result)) {
		$date = date('H:i Y-m-d', strtotime($row['created_at']));
		?>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h2 class="card-title"><?php echo $row['title']; ?></h2>
					<hr>
					<small>Created by <?php echo $row['name']; ?> at <?php echo $date; ?></small>
					<p class="card-text"><?php echo $row['text'] ?></p>
					<a class="btn btn-primary" href="index.php" role="button">Back</a>
				</div>
			</div>
		</div>
	<?php } ?>
</div>

<!--<div class="row mb-3">
	<div class="col-md">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Title for the big thing</h3>
				<p class="card-text">This is the big thing. This is filler text. There is no content as of now. We are working on it. Please be patient. This is the big thing. This is filler text. There is no content as of now. We are working on it. Please be patient. This is the big thing. This is filler text. There is no content as of now. We are working on it. Please be patient. </p>
				<a class="btn btn-primary" href="#" role="button">View details &raquo;</a>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Title for the thing</h3>
				<p class="card-text">This is the thing. This is filler text. There is no content as of now. We are working on it. Please be patient. This is the thing. This is filler text. There is no content as of now. We are working on it. Please be patient. This is the thing. This is filler text. There is no content as of now. We are working on it. Please be patient. </p>
				<a class="btn btn-primary" href="#" role="button">View details &raquo;</a>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Title for the thing</h3>
				<p class="card-text">This is the thing. This is filler text. There is no content as of now. We are working on it. Please be patient. This is the thing. This is filler text. There is no content as of now. We are working on it. Please be patient. This is the thing. This is filler text. There is no content as of now. We are working on it. Please be patient. </p>
				<a class="btn btn-primary" href="#" role="button">View details &raquo;</a>
			</div>
		</div>
	</div>
</div>-->
