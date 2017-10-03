<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="img/favicon.png">
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		
		<title>Seven Realms</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<div class="container">
				<a class="navbar-brand" href="index.php">Seven Realms</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div class="collapse navbar-collapse" id="navbarsExampleDefault">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item<?php if ($PAGE == 'index') { echo ' active'; } ?>">
							<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<?php
						if ($ISADMIN) { ?>
						<li class="nav-item<?php if ($PAGE == 'admin') { echo ' active'; } ?>">
							<a class="nav-link" href="?page=admin">Admin</a>
						</li>
						<?php } ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contents</a>
							<div class="dropdown-menu" aria-labelledby="dropdown01">
								<a class="dropdown-item" href="?page=page_spell_list">Spell list</a>
							</div>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<?php
					if ($LOGGEDIN == false) { ?>
						<form class="form-inline my-2 my-lg-0" method="POST" action="">
							<input class="form-control mr-sm-2" type="text" placeholder="Username" name="username" aria-label="Username">
							<input class="form-control mr-sm-2" type="password" placeholder="Password" name="password" aria-label="Password">
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log in</button>
						</form>
					<?php }
					else { ?>
						<li class="nav-item nav-link disabled">Welcome <?php echo $USERREALNAME; ?></li><a href="?log_out" class="btn btn-outline-success my-2 my-sm-0">Log out</a>
					<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
		
		<?php
		if ($SHOW_JUMBOTRON == true) { ?>
		<div class="jumbotron mb-0">
			<div class="container">
				<h1 class="display-3">Hello, world!</h1>
				<p>This is the beginning of the website for the Seven Realms game. More content will be added in the future.</p>
				<p><a class="btn btn-primary btn-lg" href="?hide=yes&page=<?php echo $PAGE; ?>" role="button">Dismiss</a></p>
			</div>
		</div>
		<?php
		} ?>
		
		<div class="container mt-3">
			
			{{content}}

			<hr>

			<footer>
				<p>&copy; Seven Realms Game 2017</p>
			</footer>
		</div>
		
		<script src="js/jquery-3.2.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>