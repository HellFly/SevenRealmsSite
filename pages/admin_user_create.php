<?php
include '_admin.php';

$warning = '';
$message = '';

if (isset($_POST['name'])) {
	if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password'])) {
		$warning = 'Please fill in all the fields';
	}
	else {
		$name = mysqli_real_escape_string($_POST['name']);
		$email = mysqli_real_escape_string($_POST['email']);
		$username = mysqli_real_escape_string($_POST['username']);
		$password = $_POST['password'];
		$admin = false;
		if (isset($_POST['admin'])) {
			$admin = true;
		}

		$password = md5($PASSWORDSALT . $password);

		$query = 'INSERT INTO user(`created_at`, `username`, `password`, `name`, `email`, `admin`)
			VALUES (\'' . get_datetime() . '\',
			\'' . $username . '\',
			\'' . $password . '\',
			\'' . $name . '\',
			\'' . $email . '\',
			\'' . $admin . '\');';

		$success = mysqli_query($DB, $query);
		if ($success) {
			$message = 'The user was created';
		}
		else {
			$warning = mysqli_error($DB);
		}
	}
}

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
				<h3 class="card-title">Create a user</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-group">
						<label for="name">Name</label>
						<input class="form-control" name="name" type="text"></input>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input class="form-control" name="email" type="email"></input>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input class="form-control" name="username" type="text"></input>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input class="form-control" name="password" type="password"></input>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" name="admin" type="checkbox" />
							Admin
						</label>
					</div>
					<a href="?page=admin" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>
