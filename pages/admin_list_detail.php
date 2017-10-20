<?php
include '_admin.php';

$list = mysqli_real_escape_string($DB, $_GET['list']);

$query = 'SELECT * FROM list_item
	WHERE `list_id`=' . $list . '
	ORDER BY `name`;';

$result = mysqli_query($DB, $query);

$query = 'SELECT list.id, user.id, list.name, user.name AS uname
	FROM list, user
	WHERE list.id=' . $list . '
	AND user.id = list.created_by;';
$row = mysqli_fetch_assoc(mysqli_query($DB, $query));

?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title"><?php echo $row['name']; ?></h3>
				<hr>
				<p class="card-text">
					<small>Created by <?php echo $row['uname']; ?></small><br/><br/>
					<a class="btn btn-primary" href="?page=admin_list_list">Back</a>
					<hr>
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<tr>
									<td><?php echo $row['name']; ?></th>
									<td><?php echo $row['description']; ?></td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a class="btn btn-primary" href="?page=admin_list_list">Back</a>
				</p>
			</div>
		</div>
	</div>
</div>
