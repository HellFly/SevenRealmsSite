<?php
include '_admin.php';

$query = 'SELECT article.id AS id, user.id, article.created_at, user.name, article.title, article.text
	FROM article, user
	WHERE article.created_by = user.id
	ORDER BY article.created_at DESC';

$result = mysqli_query($DB, $query);
?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Article list</h3>
				<hr>
				<p class="card-text">
					<a href="?page=admin" class="btn btn-primary">Back</a>
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Created at</th>
								<th>Created by</th>
								<th>Tite</th>
								<th>Text</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while ($row = mysqli_fetch_assoc($result)) {
								?>
									<tr>
										<th scope="row"><?php echo $row['id']; ?></th>
										<td><?php echo $row['created_at']; ?></td>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['title']; ?></td>
										<td><?php echo substr($row['text'], 0, 100); ?>...</td>
										<td><a href="?page=admin_article_edit&article=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
									</tr>
								<?php
							}
						?>
						</tbody>
					</table>
					<a href="?page=admin" class="btn btn-primary">Back</a>
				</p>
			</div>
		</div>
	</div>
</div>
