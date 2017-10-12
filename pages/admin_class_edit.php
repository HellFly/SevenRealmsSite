<?php
include '_admin.php';

$warning = '';
$message = '';

$class = $_GET['class'];

if (isset($_POST['name'])) {
	if (empty($_POST['name']) || empty($_POST['short_description']) || empty($_POST['long_description'])) {
		$warning = 'Please fill in all the fields';
	}
	else {
		$name = mysqli_real_escape_string($_POST['name']);
		$short_description = mysqli_real_escape_string($_POST['short_description']);
		$long_description = mysqli_real_escape_string($_POST['long_description']);

		$query = 'UPDATE class
			SET name=\'' . $name . '\',
			short_description=\'' . $short_description . '\',
			long_description=\'' . $long_description . '\'
			WHERE id=' . $class . ';';

		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The class was updated';
		}
		else {
			$warning = mysqli_error($DB);
		}
	}
}


$query = 'SELECT * FROM class WHERE id=' . $class . ';';

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
				<h3 class="card-title">Edit a class</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-group">
						<label for="name">Name</label>
						<input class="form-control" name="name" type="text" value="<?php echo $row['name']; ?>"></input>
					</div>
					<div class="form-group">
						<label for="short_description">Short description</label>
						<textarea class="form-control" name="short_description" rows="3"><?php echo $row['short_description']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="long_description">Long description</label>
						<textarea class="form-control" name="long_description" rows="5"><?php echo $row['long_description']; ?></textarea>
					</div>
					<a href="?page=admin_class_list" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
