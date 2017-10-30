
		<?php
		function up_1509359385($DB) {
			$query = '
			ALTER TABLE `user_character`
			  ADD KEY (`created_by`),
				ADD CONSTRAINT `user_character_iufk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
				ADD COLUMN `created_at` datetime NOT NULL AFTER `created_by`;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				return true;
			}
			else {
				echo mysqli_error($DB);
				return false;
			}
		}
		function down_1509359385($DB) {
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
