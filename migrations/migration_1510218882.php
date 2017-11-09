
		<?php
		function up_1510218882($DB) {
			$query = '
			CREATE TABLE `character_sheet` (
				`id` int(11) NOT NULL,
				`character_info` int(11) NOT NULL,
				`hp_dice` int(11) NOT NULL,
				`hp` int(11) NOT NULL,
				`stat_agi` int(11) NOT NULL,
				`stat_cha` int(11) NOT NULL,
				`stat_int` int(11) NOT NULL,
				`stat_lck` int(11) NOT NULL,
				`stat_sta` int(11) NOT NULL,
				`stat_str` int(11) NOT NULL,
				`stat_wis` int(11) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				$query = 'ALTER TABLE `character_sheet`
					ADD PRIMARY KEY (`id`),
					MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
					ADD CONSTRAINT `character_sheet_ibfk_1` FOREIGN KEY (`character_info`) REFERENCES `character_info` (`id`) ON UPDATE CASCADE;';
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
		function down_1510218882($DB) {
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
