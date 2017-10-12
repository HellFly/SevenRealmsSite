<?php
$query = 'SELECT * FROM race ORDER BY name;';

$result = mysqli_query($DB, $query);
?>
<h1>Race list</h1>
<hr>
<a class="btn btn-primary mb-3" href="?page=page_character">Back</a>
<div class="row">
	<?php
	while ($row = mysqli_fetch_assoc($result)) { ?>
		<div class="col-12 mb-3">
			<div class="card">
				<div class="card-body">
					<h3 class="card-title"><?php echo $row['name']; ?></h3>
					<p class="card-text">
						<?php echo $row['short_description']; ?></p>
					<a class="btn btn-primary" href="?page=page_character_race_detail&race=<?php echo $row['id']; ?>">View details &raquo;</a>
				</div>
			</div>
		</div>
	<?php
	}
	?>
</div>
