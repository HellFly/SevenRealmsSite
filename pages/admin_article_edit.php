<?php
include '_admin.php';

$warning = '';
$message = '';

$article = $_GET['article'];

if (isset($_POST['title'])) {
	if (empty($_POST['title']) || empty($_POST['text'])) {
		$warning = 'Please fill in all the fields';
	}
	else {
		$title = mysqli_real_escape_string($DB, $_POST['title']);
		$text = mysqli_real_escape_string($DB, $_POST['text']);

		$query = 'UPDATE article
			SET title=\'' . $title . '\',
			text=\'' . $text . '\'
			WHERE id=' . $article . ';';

		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The class was updated';
		}
		else {
			$warning = mysqli_error($DB);
		}
	}
}


$query = 'SELECT * FROM article WHERE id=' . $article . ';';

$result = mysqli_query($DB, $query);
$row = mysqli_fetch_assoc($result);

if ($message != '') { ?>
	<div class="alert alert-success" role="alert">
		<?php echo $message; ?>
	</div>
<?php }
if ($warning != '') { ?>
	<div class="alert alert-warning" role="alert">
		<?php echo $warning; ?>
	</div>
<?php }
?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Edit an article</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-group">
						<label for="title">Title</label>
						<input class="form-control" name="title" type="text" value="<?php echo $row['title']; ?>"></input>
					</div>
					<div class="form-group">
						<label for="text">Text</label>
						<textarea class="form-control" name="text" rows="3"><?php echo $row['text']; ?></textarea>
					</div>
					<a href="?page=admin_article_list" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
