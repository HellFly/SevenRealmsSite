
		<?php
		function up_1509358256($DB) {
			$query = '
			ALTER TABLE `user_character`
			  ADD PRIMARY KEY (`id`),
			  ADD KEY `class` (`class`),
			  ADD KEY `race` (`race`);';
			$result = mysqli_query($DB, $query);
			if ($result) {
				return true;
			}
			else {
				echo mysqli_error($DB);
				return false;
			}
		}
		function down_1509358256($DB) {
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
