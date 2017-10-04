<?php
include '_user.php';

$warning = '';
$message = '';

if (isset($_POST['name'])) {
	if (empty($_POST['name']) || empty($_POST['description'])) {
		$warning = 'Please fill in all the fields';
	}
	else {
		$name = $_POST['name'];
		$description = $_POST['description'];
		
		$query = 'INSERT INTO list(`created_at`, `created_by`, `name`, `description`)
			VALUES (\'' . get_datetime() . '\',
			\'' . $USERID . '\',
			\'' . $name . '\',
			\'' . $description . '\');';
		
		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The d100 list was created';
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
				<h3 class="card-title">Create a d100 list</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-group">
						<label for="name">Name</label>
						<input class="form-control" name="name" type="text"></input>
					</div>
					<div class="form-group">
						<label for="short_description">Description</label>
						<textarea class="form-control" name="description" rows="3"></textarea>
					</div>
					<a href="?page=user" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>