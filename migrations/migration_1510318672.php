
		<?php
		function up_1510318672($DB) {
			$query = 'ALTER TABLE character_sheet
			DROP hp_dice;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				$query = 'ALTER TABLE class
				ADD COLUMN `hp_dice` int(11) DEFAULT 6 AFTER `name`;';
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
		function down_1510318672($DB) {
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
