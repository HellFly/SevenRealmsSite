<?php
$meta_description = 'A list of all of the magic spells for the Seven Realms game.';

$query = 'SELECT spell.id, magic_school.name AS magic_school, spell.level, spell.name, spell.range, spell.materials, spell.duration, spell.short_description, spell.long_description
	FROM spell, magic_school
	WHERE spell.magic_school = magic_school.id
	ORDER BY magic_school.name, spell.level, spell.name;';

$result = mysqli_query($DB, $query);
?>
<h1>Spell list</h1>
<hr>
<a class="btn btn-primary mb-3" href="?page=page_magic">Back</a>
<div class="row">
	<?php
	while ($row = mysqli_fetch_assoc($result)) { ?>
		<div class="col-12 mb-3">
			<div class="card">
				<div class="card-body">
					<h3 class="card-title"><?php echo $row['name']; ?></h3>
					<p class="card-text">
						<small>Level <?php echo $row['level']; ?>, <?php echo $row['magic_school']; ?></small><br/>
						<?php echo $row['short_description']; ?></p>
					<a class="btn btn-primary" href="?page=page_magic_spell_detail&spell=<?php echo $row['id']; ?>">View details &raquo;</a>
				</div>
			</div>
		</div>
	<?php
	}
	?>
</div>
