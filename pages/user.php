<?php
	include '_user.php';
?>

<div class="col-md-12 mb-3">
	<div class="card">
		<div class="card-body">
			<h3 class="card-title">My characters</h3>
			<hr>
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
			if (mysqli_num_rows($result) > 0) {
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