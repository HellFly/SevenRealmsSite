<?php
if (isset($message) && $message != '') { ?>
	<div class="alert alert-success" role="alert">
		<?php echo $message; ?>
	</div>
<?php }
if (isset($warning) && $warning != '') { ?>
	<div class="alert alert-warning" role="alert">
		<?php echo $warning; ?>
	</div>
<?php }
?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Log in</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-group">
						<label for="username">Username</label>
						<input class="form-control" name="username" type="text"></input>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input class="form-control" name="password" type="password"></input>
					</div>
					<a href="?page=index" class="btn btn-primary">Home</a>
					<button type="submit" class="btn btn-primary">Log in</button>
				</form>
			</div>
		</div>
	</div>
</div>
