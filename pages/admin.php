<?php
	include '_admin.php';
?>
<div class="row">
	<div class="col-md-6 mb-3">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Users</h3>
				<hr>
				<p class="card-text">
					<a href="?page=admin_user_list" class="btn btn-primary">View users</a>
					<a href="?page=admin_user_create" class="btn btn-primary">Create a user</a>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 mb-3">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Magic schools</h3>
				<hr>
				<p class="card-text">
					<a href="?page=admin_school_list" class="btn btn-primary">View magic schools</a>
					<a href="?page=admin_school_create" class="btn btn-primary">Create a magic school</a>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 mb-3">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Spells</h3>
				<hr>
				<p class="card-text">
					<a href="?page=admin_spell_list" class="btn btn-primary">View spells</a>
					<a href="?page=admin_spell_create" class="btn btn-primary">Create a spell</a>
				</p>
			</div>
		</div>
	</div>
</div>