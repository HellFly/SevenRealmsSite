
		<?php
		function up_1510223580($DB) {
			$query = 'ALTER TABLE character_info DROP level;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				$query = 'ALTER TABLE character_sheet ADD COLUMN `level` int(11) NOT NULL AFTER `character_info`;';
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
		function down_1510223580($DB) {
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
