<?php
include '_admin.php';

$warning = '';
$message = '';
$spell = mysqli_real_escape_string($DB, $_GET['spell']);

if (isset($_POST['name'])) {
	if (empty($_POST['name']) || empty($_POST['short_description']) || empty($_POST['long_description'])) {
		$warning = 'Please fill in all the fields';
	}
	else {
		$name = mysqli_real_escape_string($DB, $_POST['name']);
		$magic_school = mysqli_real_escape_string($DB, $_POST['magic_school']);
		$level = mysqli_real_escape_string($DB, $_POST['level']);
		$range = '';
		if (isset($_POST['range']))
			$range = mysqli_real_escape_string($DB, $_POST['range']);
		$materials = '';
		if (isset($_POST['materials']))
			$materials = mysqli_real_escape_string($DB, $_POST['materials']);
		$duration = '';
		if (isset($_POST['duration']))
			$duration = mysqli_real_escape_string($DB, $_POST['duration']);
		$short_description = mysqli_real_escape_string($DB, $_POST['short_description']);
		$long_description = mysqli_real_escape_string($DB, $_POST['long_description']);

		$query = 'UPDATE spell
			SET `name`=\'' . $name . '\',
			`magic_school`=' . $magic_school . ',
			`level`=' . $level . ',
			`range`=\'' . $range . '\',
			`materials`=\'' . $materials . '\',
			`duration`=\'' . $duration . '\',
			`short_description`=\'' . $short_description . '\',
			`long_description`=\'' . $long_description . '\'
			WHERE id=' . $spell . ';';

		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The spell was updated';
		}
		else {
			$warning = mysqli_error($DB);
		}
	}
}

$query = 'SELECT * FROM spell WHERE id=' . $spell . ';';

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
				<h3 class="card-title">Create a spell</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-group">
						<label for="name">Name</label>
						<input class="form-control" name="name" type="text" value="<?php echo $row['name'] ?>"></input>
					</div>
					<div class="form-group">
						<label for="magic_school">Magic school</label>
						<select class="form-control" name="magic_school">
						<?php
							$query = 'SELECT id, name FROM magic_school ORDER BY name';
							$result = mysqli_query($DB, $query);
							while ($school_row = mysqli_fetch_assoc($result)) {
								?>
									<option value="<?php echo $school_row['id']; ?>"<?php if ($row['school_id'] == $school_row['id']) { echo ' selected="selected"'; } ?>><?php echo $school_row['name']; ?></option>
								<?php
							}
						?>
						</select>
					</div>
					<div class="form-group">
						<label for="level">Spell level</label>
					<input class="form-control" name="level" type="number" value="<?php echo $row['level'] ?>">
					</div>
					<div class="form-group">
						<label for="range">Range</label>
						<input class="form-control" name="range" type="text" value="<?php echo $row['range'] ?>"></input>
					</div>
					<div class="form-group">
						<label for="materials">Materials</label>
						<input class="form-control" name="materials" type="text" value="<?php echo $row['materials'] ?>"></input>
					</div>
					<div class="form-group">
						<label for="duration">Duration</label>
						<input class="form-control" name="rudation" type="text" value="<?php echo $row['duration'] ?>"></input>
					</div>
					<div class="form-group">
						<label for="short_description">Short description</label>
						<textarea class="form-control" name="short_description" rows="3"><?php echo $row['short_description'] ?></textarea>
					</div>
					<div class="form-group">
						<label for="long_description">Long description</label>
						<textarea class="form-control" name="long_description" rows="5"><?php echo $row['long_description'] ?></textarea>
					</div>
					<a href="?page=admin_spell_list" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
