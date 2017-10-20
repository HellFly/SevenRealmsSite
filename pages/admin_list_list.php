<?php
include '_admin.php';

$query = 'SELECT list.id AS id, user.id AS uid, list.created_at, user.name AS uname, list.name AS name, list.description
	FROM list, user
	WHERE list.created_by = user.id
	ORDER BY list.name DESC';

$result = mysqli_query($DB, $query);
?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">D100 list</h3>
				<hr>
				<p class="card-text">
					<a href="?page=admin" class="btn btn-primary">Back</a>
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Created at</th>
								<th>Created by</th>
								<th>Name</th>
								<th>Description</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while ($row = mysqli_fetch_assoc($result)) {
								?>
									<tr>
										<th scope="row"><?php echo $row['id']; ?></th>
										<td><?php echo $row['created_at']; ?></td>
										<td><?php echo $row['uname']; ?></td>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['description']; ?></td>
										<td><a href="?page=admin_list_detail&list=<?php echo $row['id']; ?>" class="btn btn-primary">View</a></td>
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
