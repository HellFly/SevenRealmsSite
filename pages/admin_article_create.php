<?php
include '_admin.php';

$warning = '';
$message = '';

if (isset($_POST['title'])) {
	if (empty($_POST['title']) || empty($_POST['text'])) {
		$warning = 'Please fill in all the fields';
	}
	else {
		$title = mysqli_real_escape_string($DB, $_POST['title']);
		$text = mysqli_real_escape_string($DB, $_POST['text']);

		$query = 'INSERT INTO article(`created_at`, `created_by`, `title`, `text`)
			VALUES (\'' . get_datetime() . '\',
			\'' . $USERID . '\',
			\'' . $title . '\',
			\'' . $text . '\');';

		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The article was created';
		}
		else {
			$warning = mysqli_error($DB);
		}
	}
}

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
				<h3 class="card-title">Create a spell</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-group">
						<label for="title">Title</label>
						<input class="form-control" name="title" type="text"></input>
					</div>
					<div class="form-group">
						<label for="text">Text</label>
						<textarea class="form-control" name="text" rows="5"></textarea>
					</div>
					<a href="?page=admin" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>
