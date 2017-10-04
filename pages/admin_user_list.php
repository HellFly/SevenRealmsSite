<?php
include '_admin.php';

$query = 'SELECT * FROM user';
$result = mysqli_query($DB, $query);
?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">User list</h3>
				<hr>
				<p class="card-text">
					<a href="?page=admin" class="btn btn-primary">Back</a>
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Created at</th>
								<th>Username</th>
								<th>Password</th>
								<th>Name</th>
								<th>Email</th>
								<th>Admin</th>
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
										<td><?php echo $row['username']; ?></td>
										<td>**********</td>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo ($row['admin'] ? 'Yes' : 'No'); ?></td>
										<td><a href="?page=admin_user_edit&user=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
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