<?php
	$error = '404';
	$title = '';
	$text = '';

	if (isset($_GET['error'])) {
		$error = $_GET['error'];
	}

	switch($error) {
		case '401':
			$title = 'HTTP Error 401: Unauthorized';
			$text = 'You are not authorized to view this page. Please return to the previous page or go to the home page.';
			break;
		case '403':
			$title = 'HTTP Error 403: Forbidden';
			$text = 'You are not authorized to view this page. Please return to the previous page or go to the home page.';
			break;
		case '404':
			$title = 'HTTP Error 404: Not found';
			$text = 'The requested file could not be found. Please return to the previous page or go to the home page.';
			break;
		case '500':
			$title = 'HTTP Error 500: Internal server error';
			$text = 'There has been an unexpected error. We are working on a fix for the problem. Please return to the previous page or go to the home page.';
			break;
		default:
			$title = 'There has been an unexpected error';
			$text = 'We are working on a fix for the problem. Please return to the previous page or go to the home page.';
			break;
	}

?>
<div class="card">
	<div class="card-body">
		<div class="card-title">
			<h1 class="card-title"><?php echo $title; ?></h1>
			<hr>
		</div>
		<div class="card-text">
			<p>
				<?php echo $text; ?>
			</p>
		</div>
	</div>
</div>
