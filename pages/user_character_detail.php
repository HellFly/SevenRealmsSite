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
$info = mysqli_fetch_assoc($result);
//var_dump($row);
?>
<h1>Character: <?php echo $info['name']; ?></h1>
<a href="?page=user" class="btn btn-primary">Back</a>
<br/>
<br/>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3>Character information</h3>
				<hr>
				Information goes here
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3>Character stats</h3>
				<hr>
				<?php
				$query = 'SELECT * FROM character_sheet WHERE character_info=' . $character . ';';
				$result = mysqli_query($DB, $query);
				if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
					?>
					<table class="table table-sm">
						<thead <!--class="thead-inverse"-->>
							<tr>
								<th colspan="3">
									Stats
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>AGI</td>
								<td><?php echo $row['stat_agi']; ?></td>
								<td><?php echo get_modifier($row['stat_agi']); ?></td>
							</tr>
							<tr>
								<td>CHA</td>
								<td><?php echo $row['stat_cha']; ?></td>
								<td><?php echo get_modifier($row['stat_cha']); ?></td>
							</tr>
							<tr>
								<td>INT</td>
								<td><?php echo $row['stat_int']; ?></td>
								<td><?php echo get_modifier($row['stat_int']); ?></td>
							</tr>
							<tr>
								<td>LCK</td>
								<td><?php echo $row['stat_lck']; ?></td>
								<td><?php echo get_modifier($row['stat_lck']); ?></td>
							</tr>
							<tr>
								<td>STA</td>
								<td><?php echo $row['stat_sta']; ?></td>
								<td><?php echo get_modifier($row['stat_sta']); ?></td>
							</tr>
							<tr>
								<td>STR</td>
								<td><?php echo $row['stat_str']; ?></td>
								<td><?php echo get_modifier($row['stat_str']); ?></td>
							</tr>
							<tr>
								<td>WIS</td>
								<td><?php echo $row['stat_wis']; ?></td>
								<td><?php echo get_modifier($row['stat_wis']); ?></td>
							</tr>
						</tbody>
					</table>
					<?php
				}
				else {
					?>
					There is no character sheet yet.<br/>
					<a href="?page=user_character_sheet_create&character=<?php echo $character; ?>" class="btn btn-primary">Create</a>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
<br/>
<a href="?page=user" class="btn btn-primary">Back</a>
