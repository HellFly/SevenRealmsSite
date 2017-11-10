<?php
include '_user.php';

$warning = '';
$message = '';

if (isset($_POST['name'])) {
	if (empty($_POST['name'])){ /* || empty($_POST['race']) || empty($_POST['class'])
		|| empty($_POST['gender']) || empty($_POST['age']) || empty($_POST['size'])
		|| empty($_POST['hp_dice']) || empty($_POST['alignment']) || empty($_POST['homeland'])
		|| empty($_POST['deity']) || empty($_POST['stat_agi']) || empty($_POST['stat_cha'])
		|| empty($_POST['stat_int']) || empty($_POST['stat_lck']) || empty($_POST['stat_sta'])
		|| empty($_POST['stat_str']) || empty($_POST['stat_wis']) || empty($_POST['bonus_save'])
		|| empty($_POST['bonus_attack']) || empty($_POST['bonus_defence'])
		|| empty($_POST['bonus_initiative'])) { */
		$warning = 'Please fill in all the fields';
	}
	else {
		$name = mysqli_real_escape_string($DB, $_POST['name']);
		$race = mysqli_real_escape_string($DB, $_POST['race']);
		$class = mysqli_real_escape_string($DB, $_POST['class']);
		$gender = mysqli_real_escape_string($DB, $_POST['gender']);
		$age = mysqli_real_escape_string($DB, $_POST['age']);
		$size = mysqli_real_escape_string($DB, $_POST['size']);
		$alignment = mysqli_real_escape_string($DB, $_POST['alignment']);
		$homeland = mysqli_real_escape_string($DB, $_POST['homeland']);
		$deity = mysqli_real_escape_string($DB, $_POST['deity']);

		$query = 'INSERT INTO character_info(`created_by`, `created_at`, `name`,
			`class`, `race`, `gender`, `age`, `size`, `alignment`,
			`homeland`, `deity`)
			VALUES (\'' . $USERID . '\',
			\'' . get_datetime() . '\',
			\'' . $name . '\',
			\'' . $class . '\',
			\'' . $race . '\',
			\'' . $gender . '\',
			\'' . $age . '\',
			\'' . $size . '\',
			\'' . $alignment . '\',
			\'' . $homeland . '\',
			\'' . $deity . '\');';

		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The character was created';
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
				<h3 class="card-title">Create a new character</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-row">
						<div class="form-group col">
							<label for="name" class="col-form-label">Character name</label>
							<input class="form-control" name="name" type="text"></input>
						</div>
						<div class="form-group col">
							<label for="race" class="col-form-label">Race</label>
							<select class="form-control" name="race">
							<?php
							$query = 'SELECT * FROM race';
							$result = mysqli_query($DB, $query);
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
							<?php } ?>
							</select>
						</div>
						<div class="form-group col">
							<label for="class" class="col-form-label">Class</label>
							<select class="form-control" name="class">
							<?php
							$query = 'SELECT * FROM class';
							$result = mysqli_query($DB, $query);
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
							<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label for="gender" class="col-form-label">Gender</label>
							<select class="form-control" name="gender">
								<option value="0">M</option>
								<option value="1">F</option>
							</select>
						</div>
						<div class="form-group col">
							<label for="age" class="col-form-label">Age</label>
							<input class="form-control" name="age" type="number" value="18"></input>
						</div>
						<div class="form-group col">
							<label for="size" class="col-form-label">Size</label>
							<select class="form-control" name="size">
								<option value="0">S</option>
								<option value="1" selected>M</option>
								<option value="2">L</option>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label for="alignment" class="col-form-label">Alignment</label>
							<select class="form-control" name="alignment">
								<option value="0">Lawful good</option>
								<option value="1">Neutral good</option>
								<option value="2">Chaotic good</option>
								<option value="3">Lawful neutral</option>
								<option value="4">True neutral</option>
								<option value="5" selected>Chaotic neutral</option>
								<option value="6">Lawful evil</option>
								<option value="7">Neutral evil</option>
								<option value="8">Chaotic evil</option>
							</select>
						</div>
						<div class="form-group col">
							<label for="homeland" class="col-form-label">Homeland</label>
							<select class="form-control" name="homeland">
								<option value="0">Ashèan</option>
								<option value="1">Lathian</option>
								<option value="2">Libidine</option>
								<option value="3">Library</option>
								<option value="4">Solidian</option>
								<option value="5">Swamps</option>
								<option value="6">Tundra</option>
							</select>
						</div>
						<div class="form-group col">
							<label for="deity" class="col-form-label">Deity</label>
							<select class="form-control" name="deity">
								<option value="0">Deity 1</option>
								<option value="1">Deity 2</option>
							</select>
						</div>
					</div>
					<a href="?page=user" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>
