
		<?php
		function up_1509439892($DB) {
			$query = '
			ALTER TABLE user_character
				ADD COLUMN `level` int(11) NOT NULL AFTER `name`,
				CHANGE `stat_ws` `stat_wis` int(11),
				MODIFY `alignment` int(11) NOT NULL,
				MODIFY `homeland` int(11) NOT NULL,
				MODIFY `deity` int(11) NOT NULL;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				return true;
			}
			else {
				echo mysqli_error($DB);
				return false;
			}
		}
		function down_1509439892($DB) {
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
