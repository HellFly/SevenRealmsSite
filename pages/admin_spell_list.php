<?php
include '_admin.php';

$query = 'SELECT spell.id, spell.created_at, magic_school.name AS magic_school, spell.level, spell.name, spell.range, spell.materials, spell.duration, spell.short_description, spell.long_description
	FROM spell, magic_school
	WHERE spell.magic_school = magic_school.id
	ORDER BY magic_school.name, spell.level, spell.name;';

$result = mysqli_query($DB, $query);
?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Spell list</h3>
				<hr>
				<p class="card-text">
					<a href="?page=admin" class="btn btn-primary">Back</a>
					<table class="table">
						<thead>
							<tr>
								<th>Created at</th>
								<th>Level</th>
								<th>School</th>
								<th>Name</th>
								<th>Short description</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while ($row = mysqli_fetch_assoc($result)) {
								?>
									<tr>
										<td><?php echo $row['created_at']; ?></td>
										<td><?php echo $row['level']; ?></td>
										<td><?php echo $row['magic_school']; ?></td>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['short_description']; ?></td>
										<td><a href="?page=admin_spell_edit&spell=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
										<td><a href="?page=admin_delete&back=admin_spell_list&item=spell&id=<?php echo $row['id']; ?>" class="btn btn-primary">Delete</a></td>
									</tr>
								<?php
							}
						?>
						</tbody>
					</table>
					<a href="?page=admin" class="btn btn-primary">Back</a>
				</p>
			</div>
		</div>
	</div>
</div>
