<?php
include '_user.php';

$warning = '';
$message = '';

$list = $_GET['list'];

if (isset($_POST['name'])) {
	if (empty($_POST['name']) || empty($_POST['description'])) {
		$warning = 'Please fill in all the fields';
	}
	else {
		$name = mysqli_real_escape_string($_POST['name']);
		$description = mysqli_real_escape_string($_POST['description']);

		$query = 'UPDATE list
			SET name=\'' . $name . '\',
			`description`=\'' . $description . '\'
			WHERE id=' . $list . ';';

		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The list was updated';
		}
		else {
			$warning = mysqli_error($DB);
		}
	}
}


$query = 'SELECT * FROM list WHERE id=' . $list . ';';

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
				<h3 class="card-title">Edit a magic school</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-group">
						<label for="name">Name</label>
						<input class="form-control" name="name" type="text" value="<?php echo $row['name']; ?>"></input>
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" name="description" rows="3"><?php echo $row['description']; ?></textarea>
					</div>
					<a href="?page=user" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
