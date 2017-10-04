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
						<div class="form-group col-md-6">
							<label for="character_name" class="col-form-label">Character name</label>
							<input class="form-control" name="character_name" type="text"></input>
						</div>
						<div class="form-group col-md-6">
							<label for="player_name" class="col-form-label">Player name</label>
							<input class="form-control" name="player_name" type="text"></input>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="character_name" class="col-form-label">Race</label>
							<input class="form-control" name="character_name" type="text"></input>
						</div>
						<div class="form-group col-md-3">
							<label for="player_name" class="col-form-label">Class</label>
							<input class="form-control" name="player_name" type="text"></input>
						</div>
						<div class="form-group col-md-3">
							<label for="player_name" class="col-form-label">Gender</label>
							<input class="form-control" name="player_name" type="text"></input>
						</div>
						<div class="form-group col-md-3">
							<label for="player_name" class="col-form-label">Alignment</label>
							<input class="form-control" name="player_name" type="text"></input>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label for="stat_agi" class="col-form-label">Agility</label>
							<input class="form-control" name="stat_agi" type="number" value="1"></input>
						</div>
						<div class="form-group col">
							<label for="stat_cha" class="col-form-label">Charisma</label>
							<input class="form-control" name="stat_agi" type="number" value="1"></input>
						</div>
						<div class="form-group col">
							<label for="stat_int" class="col-form-label">Inteligence</label>
							<input class="form-control" name="stat_agi" type="number" value="1"></input>
						</div>
						<div class="form-group col">
							<label for="stat_lck" class="col-form-label">Luck</label>
							<input class="form-control" name="stat_agi" type="number" value="1"></input>
						</div>
						<div class="form-group col">
							<label for="stat_sta" class="col-form-label">Stamina</label>
							<input class="form-control" name="stat_agi" type="number" value="1"></input>
						</div>
						<div class="form-group col">
							<label for="stat_str" class="col-form-label">Strength</label>
							<input class="form-control" name="stat_agi" type="number" value="1"></input>
						</div>
						<div class="form-group col">
							<label for="stat_wis" class="col-form-label">Wisdom</label>
							<input class="form-control" name="stat_agi" type="number" value="1"></input>
						</div>
					</div>
					<a href="?page=user" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>