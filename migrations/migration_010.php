
	<?php
	function up_010($DB) {
		$query = '
ALTER TABLE `spell`
	ADD CONSTRAINT `spell_ibfk_1` FOREIGN KEY (`magic_school`) REFERENCES `magic_school` (`id`) ON UPDATE CASCADE;
	';
		$result = mysqli_query($DB, $query);
		if ($result) {
			return true;
		}
		else {
			echo mysqli_error($DB);
			return false;
		}
	}
	function down_010($DB) {
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
	