<?php
include '_user.php';

$list = mysqli_real_escape_string($DB, $_GET['list']);

$warning = '';
$message = '';

if (isset($_POST['name'])) {
	if (empty($_POST['name']) || empty($_POST['description'])) {
		$warning = 'Please fill in all the fields';
	}
	else {
		$name = mysqli_real_escape_string($DB, $_POST['name']);
		$description = mysqli_real_escape_string($DB, $_POST['description']);

		$query = 'INSERT INTO list_item(`created_at`, `list_id`, `name`, `description`)
			VALUES (\'' . get_datetime() . '\',
			\'' . $list . '\',
			\'' . $name . '\',
			\'' . $description . '\');';

		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The item was added';
		}
		else {
			$warning = mysqli_error($DB);
		}
	}
}

$query = 'SELECT * FROM list_item
	WHERE `list_id`=' . $list . '
	ORDER BY `name`;';

$result = mysqli_query($DB, $query);

$query = 'SELECT name FROM list WHERE id=' . $list . ';';
$row = mysqli_fetch_assoc(mysqli_query($DB, $query));


if ($message != '') { ?>
	<div class="alert alert-success" role="alert">
		<?php echo $message; ?>
	</div>
<?php }
if ($warning != '') { ?>
	<div class="alert alert-warning" role="alert">
		<?php echo $warning; ?>
	</div>
<?php }
?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title"><?php echo $row['name']; ?></h3>
				<hr>
				<p class="card-text">
					<a class="btn btn-primary" href="?page=user">Back</a>
					<hr>
					<table class="table">
						<thead>
							<tr>
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
									<td><?php echo $row['name']; ?></th>
									<td><?php echo $row['description']; ?></td>
									<td></td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a class="btn btn-primary" href="?page=user">Back</a>
					<hr>
					<h3>Add item</h3>
					<hr>
					<form action="" method="POST">
						<div class="form-group">
							<label for="name">Name</label>
							<input class="form-control" name="name" type="text"></input>
						</div>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" name="description" rows="3"></textarea>
					</div>
						<button type="submit" class="btn btn-primary">Add</button>
					</form>
				</p>
			</div>
		</div>
	</div>
</div>
