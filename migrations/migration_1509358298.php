
		<?php
		function up_1509358298($DB) {
			$query = '
			ALTER TABLE `user_character`
			  ADD CONSTRAINT `user_character_icfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`id`) ON UPDATE CASCADE,
			  ADD CONSTRAINT `user_character_irfk_1` FOREIGN KEY (`race`) REFERENCES `race` (`id`) ON UPDATE CASCADE;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				return true;
			}
			else {
				echo mysqli_error($DB);
				return false;
			}
		}
		function down_1509358298($DB) {
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
