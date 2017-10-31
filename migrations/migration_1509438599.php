
		<?php
		function up_1509438599($DB) {
			$query = '
			ALTER TABLE user_character
				MODIFY `gender` int(11) NOT NULL,
				MODIFY `size` int(11) NOT NULL;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				return true;
			}
			else {
				echo mysqli_error($DB);
				return false;
			}
		}
		function down_1509438599($DB) {
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
