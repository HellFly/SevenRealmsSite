
		<?php
		function up_1510781531($DB) {
			$query = '
			CREATE TABLE `character_note` (
				`id` int(11) NOT NULL,
				`character_info` int(11) NOT NULL,
				`title` text,
				`note` text
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				$query = 'ALTER TABLE `character_note`
					ADD PRIMARY KEY (`id`),
					MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
					ADD CONSTRAINT `character_note_ibfk_1` FOREIGN KEY (`character_info`) REFERENCES `character_info` (`id`) ON UPDATE CASCADE;';
				$result = mysqli_query($DB, $query);
				if ($result) {
					return true;
				}
				else {
					echo mysqli_error($DB);
					return false;
				}
			}
			else {
				echo mysqli_error($DB);
				return false;
			}
		}
		function down_1510781531($DB) {
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
