<?php
include '_admin.php';

$item = mysqli_real_escape_string($DB, $_GET['item']);
$id = mysqli_real_escape_string($DB, $_GET['id']);
$back = mysqli_real_escape_string($DB, $_GET['back']);
$delete = false;
if (isset($_GET['delete']) && ! empty($_GET['delete'])) {
	$delete = true;
}

if ($delete) {
	if ($item == 'user' || $item == 'spell' || $item == 'magic_school' || $item == 'race' || $item == 'class' || $item == 'article') {
		$query = 'DELETE FROM ' . $item . ' WHERE id=' . $id . ';';
		$result = mysqli_query($DB, $query);
	}
	header('Refresh: 0; url=' . $_SERVER['PHP_SELF'] . '?page=' . $back);
	exit();
}
?>
<div class="card">
	<div class="card-body">
		<?php
		$message = 'Are you sure you want to delete this?';

		if ($item == 'user' || $item == 'spell' || $item == 'magic_school' || $item == 'race' || $item == 'class' || $item == 'article') {
			$query = 'SELECT * FROM ' . $item . ' WHERE id=' . $id . ';';
			$result = mysqli_query($DB, $query);
			$row = mysqli_fetch_assoc($result);

			switch ($item) {
				case 'article':
					$message = 'Are you sure you want to delete the article ' . $row['title'] . '?';
					break;
				default:
					$message = 'Are you sure you want to delete the ' . $item . ' ' . $row['name'] . '?';
					break;
			}
		}
		?>
		<h3 class="card-title"><?php echo $message; ?></h3>
		<hr>
		<p class="card-text">
			<a href="?page=<?php echo $back; ?>" class="btn btn-primary">Cancel</a>
			<a href="?page=admin_delete<?php echo '&item=' . $item . '&id=' . $id . '&back=' . $back; ?>&delete=1" class="btn btn-primary">Delete</a>
		</p>
	</div>
</div>
