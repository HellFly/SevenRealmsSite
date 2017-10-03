<?php
$query = 'SELECT * FROM magic_school';

$result = mysqli_query($DB, $query);
?>

<div class="row">
	<?php
	while ($row = mysqli_fetch_assoc($result)) { ?>
		<div class="col-12 mb-3">
			<div class="card">
				<div class="card-body">
					<h3 class="card-title"><?php echo $row['name']; ?></h3>
					<p class="card-text">
						<?php echo $row['short_description']; ?></p>
					<a class="btn btn-secondary" href="?page=page_school_detail&school_id=<?php echo $row['id']; ?>">View details &raquo;</a>
				</div>
			</div>
		</div>
	<?php
	}
	?>
</div>