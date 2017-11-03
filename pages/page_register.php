<?php
$warning = '';
$message = '';

if (isset($_POST['name'])) {
	if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2'])) {
		$warning = 'Please fill in all the fields';
	}
	else {
		$name = mysqli_real_escape_string($DB, $_POST['name']);
		$username = mysqli_real_escape_string($DB, $_POST['username']);
		$email = mysqli_real_escape_string($DB, $_POST['email']);
		$password = mysqli_real_escape_string($DB, $_POST['password']);
		$password2 = mysqli_real_escape_string($DB, $_POST['password2']);

		if ($password == $password2) {
			$query = 'INSERT INTO user(`created_at`, `username`, `password`, `name`, `email`)
				VALUES (\'' . get_datetime() . '\',
				\'' . $username . '\',
				\'' . $password . '\',
				\'' . $name . '\',
				\'' . $email . '\');';

			$success = mysqli_query($DB, $query);
			if ($success) {
				$message = 'Your account has been created. Please go to your email to activate it.';
			}
			else {
				$warning = mysqli_error($DB);
			}
		}
		else {
			$warning = 'The passwords don\'t match. Please try again.';
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
				<h3 class="card-title">Reguster an account</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-group">
						<label for="name">Name</label>
						<input class="form-control" name="name" type="text"></input>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input class="form-control" name="username" type="text"></input>
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input class="form-control" name="email" type="email"></input>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input class="form-control" name="password" type="text"></input>
					</div>
					<div class="form-group">
						<label for="password2">Repeat password</label>
						<input class="form-control" name="password2" type="text"></input>
					</div>
					<a href="?page=index" class="btn btn-primary">Back</a>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>
