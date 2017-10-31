
		<?php
		function up_1509439163($DB) {
			$query = '
			ALTER TABLE user_character
				ADD COLUMN `hp_dice` int(11) NOT NULL AFTER `deity`,
				ADD COLUMN `hp` int(11) NOT NULL AFTER `hp_dice`;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				return true;
			}
			else {
				echo mysqli_error($DB);
				return false;
			}
		}
		function down_1509439163($DB) {
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
