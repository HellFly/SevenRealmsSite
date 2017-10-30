
		<?php
		function up_1509358127($DB) {
			$query = '
			CREATE TABLE `user_character` (
			  `id` int(11) NOT NULL,
			  `created_by` int(11) NOT NULL,
			  `name` text NOT NULL,
			  `class` int(11) NOT NULL,
			  `race` int(11) NOT NULL,
			  `gender` text NOT NULL,
			  `age` int(11) NOT NULL,
			  `size` text NOT NULL,
			  `alignment` text NOT NULL,
			  `homeland` text NOT NULL,
			  `deity` text NOT NULL,
			  `stat_agi` int(11) NOT NULL,
			  `stat_cha` int(11) NOT NULL,
			  `stat_int` int(11) NOT NULL,
			  `stat_lck` int(11) NOT NULL,
			  `stat_sta` int(11) NOT NULL,
			  `stat_str` int(11) NOT NULL,
			  `stat_ws` int(11) NOT NULL,
			  `bonus_save` int(11) NOT NULL,
			  `bonus_attack` int(11) NOT NULL,
			  `bonus_defence` int(11) NOT NULL,
			  `bonus_initiative` int(11) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				return true;
			}
			else {
				echo mysqli_error($DB);
				return false;
			}
		}
		function down_1509358127($DB) {
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
