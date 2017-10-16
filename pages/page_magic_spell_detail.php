<?php
$spell = mysqli_real_escape_string($_GET['spell']);

$query = 'SELECT spell.id, magic_school.name AS magic_school, spell.level, spell.name, spell.range, spell.materials, spell.duration, spell.short_description, spell.long_description
	FROM spell, magic_school
	WHERE spell.id = ' . $spell . '
		AND spell.magic_school = magic_school.id
	ORDER BY magic_school.name, spell.level;';

$result = mysqli_query($DB, $query);
$row = mysqli_fetch_assoc($result);
?>

<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title"><?php echo $row['name']; ?></h3>
				<table class="table">
					<tbody>
						<tr>
							<th scope="row">School</th>
							<td><?php echo $row['magic_school']; ?></td>
						</tr>
						<tr>
							<th scope="row">Level</th>
							<td><?php echo $row['level']; ?></td>
						</tr>
						<tr>
							<th scope="row">Range</th>
							<td><?php echo $row['range']; ?></td>
						</tr>
						<tr>
							<th scope="row">Materials</th>
							<td><?php echo $row['materials']; ?></td>
						</tr>
						<tr>
							<th scope="row">Duration</th>
							<td><?php echo $row['duration']; ?></td>
						</tr>
						<tr>
							<th scope="row">Description</th>
							<td><?php echo $row['long_description']; ?></td>
						</tr>
					</tbody>
				</table>
				<a class="btn btn-primary" href="?page=page_magic_spell_list">Back</a>
			</div>
		</div>
	</div>
</div>
