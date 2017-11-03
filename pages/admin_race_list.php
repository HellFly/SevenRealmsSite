<?php
include '_admin.php';

$query = 'SELECT * FROM race ORDER BY name;';

$result = mysqli_query($DB, $query);
?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Race list</h3>
				<hr>
				<p class="card-text">
					<a href="?page=admin" class="btn btn-primary">Back</a>
					<table class="table">
						<thead>
							<tr>
								<th>Created at</th>
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
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['short_description']; ?></td>
										<td><a href="?page=admin_race_edit&race=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
										<td><a href="?page=admin_delete&back=admin_race_list&item=race&id=<?php echo $row['id']; ?>" class="btn btn-primary">Delete</a></td>
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
