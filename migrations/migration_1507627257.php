
		<?php
		function up_1507627257($DB) {
			$query = '
CREATE TABLE `article` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`created_at` datetime NOT NULL,
	`created_by` int(11) NOT NULL,
	`title` text NOT NULL,
	`text` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				return true;
			}
			else {
				echo mysqli_error($DB);
				return false;
			}
		}
		function down_1507627257($DB) {
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
