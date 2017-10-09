
	<?php
	function up_003($DB) {
		$query = '
CREATE TABLE IF NOT EXISTS `list_item` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`created_at` datetime NOT NULL,
	`list_id` int(11) NOT NULL,
	`name` text NOT NULL,
	`description` text NOT NULL,
	PRIMARY KEY (`id`),
	KEY `list_id` (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	';
		$result = mysqli_query($DB, $query);
		if ($result) {
			return true;
		}
		else {
			echo mysqli_error($DB);
			return false;
		}
	}
	function down_003($DB) {
		$query = 'SELECT * FROM user';
		$result = mysqli_query($DB, $query);
		if ($result) {
			return true;
		}
		else {
			echo mysqli_error($DB);
			return false;
		}
	}
	?>
	