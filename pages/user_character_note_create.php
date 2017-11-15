<?php
include '_user.php';

$warning = '';
$message = '';

$character = mysqli_real_escape_string($DB, $_GET['character']);

if (isset($_POST['title']) && isset($_POST['note'])) {
	if (empty($_POST['title']) || empty($_POST['note'])){
		$warning = 'Please fill in all the fields';
	}
	else {
		$title = mysqli_real_escape_string($DB, $_POST['title']);
		$note = mysqli_real_escape_string($DB, $_POST['note']);

		$query = 'INSERT INTO character_note(`character_info`, `title`, `note`)
			VALUES (\'' . $character . '\',
			\'' . $title . '\',
			\'' . $note . '\');';

		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The note was added';
			header('Refresh: 0; url=index.php?page=user_character_detail&character=' . $character);
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
				<h3 class="card-title">Add note</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-group">
						<label for="title" class="col-form-label">Title</label>
						<input class="form-control" name="title" type="text"></input>
					</div>
					<div class="form-group">
						<label for="note">Note</label>
						<textarea class="form-control" name="note" rows="5"></textarea>
					</div>
					<input name="character" type="hidden" value="<?php echo $character; ?>"></input>
					<a href="?page=user_character_detail&character=<?php echo $character; ?>" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Add note</button>
				</form>
			</div>
		</div>
	</div>
</div>
