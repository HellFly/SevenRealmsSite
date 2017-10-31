<?php
include '_user.php';

$warning = '';
$message = '';

/*if (isset($_POST['name'])) {
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
			$message = 'The character was created';
		}
		else {
			$warning = mysqli_error($DB);
		}
	}
}*/

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
						<div class="form-group col">
							<label for="gender" class="col-form-label">Gender</label>
							<select class="form-control" name="gender">
								<option value="0">M</option>
								<option value="1">F</option>
							</select>
						</div>
					</div>
					<div class="form-row">
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
						<div class="form-group col">
							<label for="hp_dice" class="col-form-label">Hit die</label>
							<select class="form-control" name="hp_dice">
								<option value="6">d6</option>
								<option value="8" selected>d8</option>
								<option value="10">d10</option>
								<option value="12">d12</option>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label for="alignment" class="col-form-label">Alignment</label>
							<input class="form-control" name="alignment" type="text"></input>
						</div>
						<div class="form-group col">
							<label for="homeland" class="col-form-label">Homeland</label>
							<input class="form-control" name="homeland" type="text"></input>
						</div>
						<div class="form-group col">
							<label for="deity" class="col-form-label">Deity</label>
							<input class="form-control" name="deity" type="text"></input>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label for="stat_agi" class="col-form-label">Agility</label>
							<input class="form-control" name="stat_agi" type="number" value="10"></input>
						</div>
						<div class="form-group col">
							<label for="stat_cha" class="col-form-label">Charisma</label>
							<input class="form-control" name="stat_cha" type="number" value="10"></input>
						</div>
						<div class="form-group col">
							<label for="stat_int" class="col-form-label">Inteligence</label>
							<input class="form-control" name="stat_int" type="number" value="10"></input>
						</div>
						<div class="form-group col">
							<label for="stat_lck" class="col-form-label">Luck</label>
							<input class="form-control" name="stat_lck" type="number" value="10"></input>
						</div>
						<div class="form-group col">
							<label for="stat_sta" class="col-form-label">Stamina</label>
							<input class="form-control" name="stat_sta" type="number" value="10"></input>
						</div>
						<div class="form-group col">
							<label for="stat_str" class="col-form-label">Strength</label>
							<input class="form-control" name="stat_str" type="number" value="10"></input>
						</div>
						<div class="form-group col">
							<label for="stat_wis" class="col-form-label">Wisdom</label>
							<input class="form-control" name="stat_wis" type="number" value="10"></input>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label for="bonus_save" class="col-form-label">Save bonus</label>
							<input class="form-control" name="bonus_save" type="number" value="0"></input>
						</div>
						<div class="form-group col">
							<label for="bonus_attack" class="col-form-label">Attack bonus</label>
							<input class="form-control" name="bonus_attack" type="number" value="0"></input>
						</div>
						<div class="form-group col">
							<label for="bonus_defence" class="col-form-label">Defence bonus</label>
							<input class="form-control" name="bonus_defence" type="number" value="0"></input>
						</div>
						<div class="form-group col">
							<label for="bonus_initiative" class="col-form-label">Initiative bonus</label>
							<input class="form-control" name="bonus_initiative" type="number" value="0"></input>
						</div>
					</div>
					<a href="?page=user" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>
