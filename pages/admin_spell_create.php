<?php
include '_admin.php';

$warning = '';
$message = '';

if (isset($_POST['name'])) {
	if (empty($_POST['name']) || empty($_POST['short_description']) || empty($_POST['long_description'])) {
		$warning = 'Please fill in all the fields';
	}
	else {
		$name = mysqli_real_escape_string($DB, $_POST['name']);
		$magic_school = mysqli_real_escape_string($DB, $_POST['magic_school']);
		$level = mysqli_real_escape_string($DB, $_POST['level']);
		$range = mysqli_real_escape_string($DB, $_POST['range']);
		$materials = mysqli_real_escape_string($DB, $_POST['materials']);
		$duration = mysqli_real_escape_string($DB, $_POST['duration']);
		$short_description = mysqli_real_escape_string($DB, $_POST['short_description']);
		$long_description = mysqli_real_escape_string($DB, $_POST['long_description']);

		$query = 'INSERT INTO spell(`created_at`, `name`, `magic_school`, `level`, `range`, `materials`, `duration`, `short_description`, `long_description`)
			VALUES (\'' . get_datetime() . '\',
			\'' . $name . '\',
			\'' . $magic_school . '\',
			\'' . $level . '\',
			\'' . $range . '\',
			\'' . $materials . '\',
			\'' . $duration . '\',
			\'' . $short_description . '\',
			\'' . $long_description . '\');';

		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The spell was created';
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
						<label for="name">Name</label>
						<input class="form-control" name="name" type="text"></input>
					</div>
					<div class="form-group">
						<label for="magic_school">Magic school</label>
						<select class="form-control" name="magic_school">
						<?php
							$query = 'SELECT id, name FROM magic_school ORDER BY name';
							$result = mysqli_query($DB, $query);
							while ($row = mysqli_fetch_assoc($result)) {
								?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
								<?php
							}
						?>
						</select>
					</div>
					<div class="form-group">
						<label for="level">Spell level</label>
					<input class="form-control" name="level" type="number" value="1">
					</div>
					<div class="form-group">
						<label for="range">Range</label>
						<input class="form-control" name="range" type="text"></input>
					</div>
					<div class="form-group">
						<label for="materials">Materials</label>
						<input class="form-control" name="materials" type="text"></input>
					</div>
					<div class="form-group">
						<label for="duration">Duration</label>
						<input class="form-control" name="rudation" type="text"></input>
					</div>
					<div class="form-group">
						<label for="short_description">Short description</label>
						<textarea class="form-control" name="short_description" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="long_description">Long description</label>
						<textarea class="form-control" name="long_description" rows="5"></textarea>
					</div>
					<a href="?page=admin" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>
