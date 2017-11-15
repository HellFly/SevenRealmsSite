<?php
include '_admin.php';

$query = 'SELECT character_info.id AS id, user.id AS uid, character_info.created_at, user.name AS created_by, character_info.name AS name, race.name AS race, class.name AS class
	FROM character_info, user, race, class
	WHERE character_info.created_by = user.id
	AND class.id = character_info.class
	AND race.id = character_info.race
	ORDER BY character_info.name;';

$result = mysqli_query($DB, $query);
?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Characters</h3>
				<hr>
				<p class="card-text">
					<a href="?page=admin" class="btn btn-primary">Back</a>
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Created by</th>
								<th>Race</th>
								<th>Class</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while ($row = mysqli_fetch_assoc($result)) {
								?>
									<tr>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['created_by']; ?></td>
										<td><?php echo $row['race']; ?></td>
										<td><?php echo $row['class']; ?></td>
										<td><a href="?page=admin_character_detail&character=<?php echo $row['id']; ?>" class="btn btn-primary">Details</a></td>
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
