<?php
	include '_user.php';
?>

<div class="col-md-12 mb-3">
	<div class="card">
		<div class="card-body">
			<h3 class="card-title">My characters</h3>
			<?php
			$query = 'SELECT character_info.id AS id, character_info.name AS name, class.name AS class, race.name AS race
				FROM character_info, class, race
				WHERE character_info.created_by=' . $USERID . '
				AND character_info.class = class.id
				AND character_info.race = race.id
				ORDER BY character_info.name;';
			$result = mysqli_query($DB, $query);
			if ($result && mysqli_num_rows($result) > 0) {
				?>
				<table class="table span12">
					<thead>
						<tr>
							<th style="width: 20%;">Name</th>
							<th style="width: 70%;">Description</th>
							<th style="width: 10%;"></th>
						</tr>
					</thead>
					<?php
					while ($row = mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['race'] . ' ' . $row['class']; ?></td>
							<td><a href="?page=user_character_detail&character=<?php echo $row['id']; ?>" class="btn btn-primary">View</a></td>
						</tr>
						<?php
					}
					?>
				</table>
				<?php
			}
			?>
			<p class="card-text">
				<a href="?page=user_character_create" class="btn btn-primary">New character</a>
			</p>
		</div>
	</div>
</div>
<div class="col-md-12 mb-3">
	<div class="card">
		<div class="card-body">
			<h3 class="card-title">My d100 lists</h3>
			<?php
			$query = 'SELECT * FROM list WHERE `created_by`=' . $USERID . ' ORDER BY name;';
			$result = mysqli_query($DB, $query);
			if ($result && mysqli_num_rows($result) > 0) {
				?>
				<table class="table span12">
					<thead>
						<tr>
							<th style="width: 20%;">Name</th>
							<th style="width: 60%;">Description</th>
							<th style="width: 10%;"></th>
							<th style="width: 10%;"></th>
						</tr>
					</thead>
					<?php
					while ($row = mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td><a href="?page=user_list_edit&list=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
							<td><a href="?page=user_list_detail&list=<?php echo $row['id']; ?>" class="btn btn-primary">View</a></td>
						</tr>
						<?php
					}
					?>
				</table>
				<?php
			}
			?>
			<p class="card-text">
				<a href="?page=user_list_create" class="btn btn-primary">Create a new list</a>
			</p>
		</div>
	</div>
</div>
