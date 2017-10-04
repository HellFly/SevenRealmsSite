<?php
$school_id = $_GET['school_id'];

$query = 'SELECT * FROM magic_school
	WHERE id = ' . $school_id . ';';

$result = mysqli_query($DB, $query);
$row = mysqli_fetch_assoc($result);
?>

<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title"><?php echo $row['name']; ?></h3>
				<table class="table">
					<tbody>
						<tr>
							<th scope="row">Description</th>
							<td><?php echo $row['long_description']; ?></td>
						</tr>
					</tbody>
				</table>
				<a class="btn btn-primary" href="?page=page_magic_school_list">Back</a>
			</div>
		</div>
	</div>
</div>