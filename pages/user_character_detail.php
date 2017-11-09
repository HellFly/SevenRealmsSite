<?php
include '_user.php';

$character = mysqli_real_escape_string($DB, $_GET['character']);

$query = 'SELECT character_info.id, character_info.name, class.name AS class, race.name AS race
	FROM character_info, class, race
	WHERE character_info.id=' . $character . '
	AND character_info.class = class.id
	AND character_info.race = race.id
	ORDER BY character_info.name;';

$result = mysqli_query($DB, $query);
$row = mysqli_fetch_assoc($result);
//var_dump($row);
?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h1>Character: <?php echo $row['name']; ?></h1>
				<hr>
				<a href="?page=user" class="btn btn-primary">Back</a>

				<a href="?page=user" class="btn btn-primary">Back</a>
			</div>
		</div>
	</div>
</div>
