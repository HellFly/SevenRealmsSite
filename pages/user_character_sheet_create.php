<?php
include '_user.php';

$warning = '';
$message = '';

$character = mysqli_real_escape_string($DB, $_GET['character']);

if (isset($_POST['stat_agi'])) {
	if (empty($_POST['stat_agi'])){ /* || empty($_POST['race']) || empty($_POST['class'])
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
		$character = mysqli_real_escape_string($DB, $_POST['character']);

		$query = 'SELECT class.hp_dice AS hp FROM class, character_info
			WHERE character_info.id = ' . $character . '
			AND class.id = character_info.class';
		$result = mysqli_query($DB, $query);
		$row = mysqli_fetch_assoc($result);
		$hp_dice = $row['hp'];

		$hp = mysqli_real_escape_string($DB, $_POST['hp']);
		$stat_agi = mysqli_real_escape_string($DB, $_POST['stat_agi']);
		$stat_cha = mysqli_real_escape_string($DB, $_POST['stat_cha']);
		$stat_int = mysqli_real_escape_string($DB, $_POST['stat_int']);
		$stat_lck = mysqli_real_escape_string($DB, $_POST['stat_lck']);
		$stat_sta = mysqli_real_escape_string($DB, $_POST['stat_sta']);
		$stat_str = mysqli_real_escape_string($DB, $_POST['stat_str']);
		$stat_wis = mysqli_real_escape_string($DB, $_POST['stat_wis']);

		$query = 'INSERT INTO character_sheet(`character_info`, `level`, `hp`,
			`stat_agi`, `stat_cha`, `stat_int`, `stat_lck`, `stat_sta`, `stat_str`, `stat_wis`)
			VALUES (\'' . $character . '\',
			\'1\',
			\'' . ($hp_dice + $hp) . '\',
			\'' . $stat_agi . '\',
			\'' . $stat_cha . '\',
			\'' . $stat_int . '\',
			\'' . $stat_lck . '\',
			\'' . $stat_sta . '\',
			\'' . $stat_str . '\',
			\'' . $stat_wis . '\');';

		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The character stats were added';
			header('Refresh: 0; url=indes.php?page=user_character_detail&character=' . $character);
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
				<h3 class="card-title">Add character stats</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-row">
						<div class="form-group col">
							<label for="hp" class="col-form-label">First HP roll</label>
							<input class="form-control" name="hp" type="number" value="0"></input>
						</div>
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
					</div>
					<div class="form-row">
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
						<input name="character" type="hidden" value="<?php echo $character; ?>"></input>
					</div>
					<a href="?page=user_character_detail&character=<?php echo $character; ?>" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Add stats</button>
				</form>
			</div>
		</div>
	</div>
</div>
