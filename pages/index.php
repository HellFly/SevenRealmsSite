<?php
$meta_description = 'Welcome to the home page of the Seven Realms game. You can find all of the available information on this site.';

$query = 'SELECT article.id AS article_id, user.id, article.created_at, user.name, article.title, article.text
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
		<div class="col-md-6 mb-3">
			<div class="card">
				<div class="card-body">
					<h2 class="card-title"><?php echo $row['title']; ?></h2>
					<hr>
					<small>Created by <?php echo $row['name']; ?> at <?php echo $date; ?></small>
					<p class="card-text"><?php echo substr($row['text'], 0,200); ?>...</p>
					<a class="btn btn-primary" href="?page=page_article&article=<?php echo $row['article_id']; ?>" role="button">View more</a>
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
