<?php
include '_user.php';

$item = mysqli_real_escape_string($DB, $_GET['item']);
$id = mysqli_real_escape_string($DB, $_GET['id']);
$back = mysqli_real_escape_string($DB, $_GET['back']);
$back_id = -1;
$additional_get = '';
if (isset($_GET['back_id'])) {
	$back_id = mysqli_real_escape_string($DB, $_GET['back_id']);
}
$delete = false;
if (isset($_GET['delete']) && ! empty($_GET['delete'])) {
	$delete = true;
}

if ($delete) {
	if ($item == 'list_item') {
		$query = 'SELECT list_item.name, list_item.id FROM list_item, list
			WHERE list_item.list_id = list.id
			AND list_item.id=' . $id . '
			AND created_by=' . $USERID . ';';
		$result = mysqli_query($DB, $query);
		$id_in = false;
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['id'] == $id) {
				$id_in = true;
			}
		}
		if ($id_in) {
			$query = 'DELETE FROM ' . $item . ' WHERE id=' . $id . ';';
			$result = mysqli_query($DB, $query);
		}
		$additional_get .= '&list=' . $back_id;
	}
	header('Refresh: 0; url=' . $_SERVER['PHP_SELF'] . '?page=' . $back . $additional_get);
	exit();
}
?>
<div class="card">
	<div class="card-body">
		<?php
		$message = 'Are you sure you want to delete this?';

		if ($item == 'list_item') {
			$query = 'SELECT list_item.name, list_item.id FROM list_item, list
				WHERE list_item.list_id = list.id
				AND list_item.id=' . $id . '
				AND created_by=' . $USERID . ';';
			$result = mysqli_query($DB, $query);
			$row = mysqli_fetch_assoc($result);

			switch ($item) {
				case 'list_item':
					$message = 'Are you sure you want to delete the item ' . $row['name'] . '?';
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
			<a href="?page=user_delete<?php echo '&item=' . $item . '&id=' . $id . '&back=' . $back . ($back_id == -1 ? '' : '&back_id=' . $back_id); ?>&delete=1" class="btn btn-primary">Delete</a>
		</p>
	</div>
</div>
