<?php
$school = $_GET['school'];

$query = 'SELECT * FROM magic_school
	WHERE id = ' . $school . ';';

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
							<th scope="row">Description</th>
							<td><?php echo $row['long_description']; ?></td>
						</tr>
					</tbody>
				</table>
				<a class="btn btn-primary" href="?page=page_magic_school_list">Back</a>
			</div>
		</div>
	</div>
</div>
<hr>
<h2 class="mb-3">Spells</h2>
<div class="row">
<?php
$query = 'SELECT spell.id, spell.level, spell.name, spell.range, spell.materials, spell.duration, spell.short_description, spell.long_description
	FROM spell, magic_school
	WHERE spell.magic_school = ' . $school . '
	AND spell.magic_school = magic_school.id
	ORDER BY magic_school.name, spell.level, spell.name;';

$result = mysqli_query($DB, $query);

while ($row = mysqli_fetch_assoc($result)) { ?>
	<div class="col-12 mb-3">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title"><?php echo $row['name']; ?></h3>
				<p class="card-text">
					<small>Level <?php echo $row['level']; ?></small><br/>
					<?php echo $row['short_description']; ?>
				</p>
				<!--<a class="btn btn-primary" href="?page=page_magic_spell_detail&spell_id=<?php echo $row['id']; ?>">View details &raquo;</a>-->
			</div>
		</div>
	</div>
<?php
}
?>
</div>
