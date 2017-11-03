
		<?php
		function up_1509700261($DB) {
			$query = '
			ALTER TABLE user
				ADD COLUMN `activated` int(11) DEFAULT 0 AFTER `admin`,
				MODIFY `admin` int(11) DEFAULT 0;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				$query = '
				UPDATE user
				SET activated=1 WHERE 1';
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
		function down_1509700261($DB) {
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
