
	<?php
	function up_007($DB) {
		$query = '
CREATE TABLE IF NOT EXISTS `user` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`created_at` datetime NOT NULL,
	`username` text NOT NULL,
	`password` text NOT NULL,
	`name` text NOT NULL,
	`email` text NOT NULL,
	`admin` tinyint(1) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
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
	function down_007($DB) {
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
	