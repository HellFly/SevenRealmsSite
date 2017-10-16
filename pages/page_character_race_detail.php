<?php
$race = mysqli_real_escape_string($_GET['race']);

$query = 'SELECT * FROM race
	WHERE id = ' . $race . ';';

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
				<a class="btn btn-primary" href="?page=page_character_race_list">Back</a>
			</div>
		</div>
	</div>
</div>
