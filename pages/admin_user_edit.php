<?php
include '_admin.php';

$warning = '';
$message = '';

$user = mysqli_real_escape_string($DB, $_GET['user']);

if (isset($_POST['name'])) {
	if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['username'])) {
		$warning = 'Please fill in all the fields';
	}
	else {
		$name = mysqli_real_escape_string($DB, $_POST['name']);
		$email = mysqli_real_escape_string($DB, $_POST['email']);
		$username = mysqli_real_escape_string($DB, $_POST['username']);
		$admin = 0;
		if (isset($_POST['admin'])) {
			$admin = 1;
		}

		$query = 'UPDATE user
			SET name=\'' . $name . '\',
			email=\'' . $email . '\',
			username=\'' . $username . '\',
			admin=\'' . $admin . '\'
			WHERE id=' . $user . ';';

		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The user was updated';
		}
		else {
			$warning = mysqli_error($DB);
		}
	}
}


$query = 'SELECT * FROM user WHERE id=' . $user . ';';

$result = mysqli_query($DB, $query);
$row = mysqli_fetch_assoc($result);

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
				<h3 class="card-title">Edit a user</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-group">
						<label for="name">Name</label>
						<input class="form-control" name="name" type="text" value="<?php echo $row['name']; ?>"></input>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input class="form-control" name="email" type="email" value="<?php echo $row['email']; ?>"></input>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input class="form-control" name="username" type="text" value="<?php echo $row['username']; ?>"></input>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input class="form-control" name="password" type="password" readonly value="**********"></input>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" name="admin" type="checkbox" <?php if ($row['admin'] == '1') { echo 'checked'; } ?>/>
							Admin
						</label>
					</div>
					<a href="?page=admin_user_list" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
