
		<?php
		function up_1510218522($DB) {
			$query = '
			ALTER TABLE user_character
			DROP bonus_save,
			DROP bonus_attack,
			DROP bonus_defence,
			DROP bonus_initiative,
			DROP hp_dice,
			DROP hp,
			DROP stat_agi,
			DROP stat_cha,
			DROP stat_int,
			DROP stat_lck,
			DROP stat_sta,
			DROP stat_str,
			DROP stat_wis;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				$query = 'RENAME TABLE user_character TO character_info;';
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
		function down_1510218522($DB) {
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
