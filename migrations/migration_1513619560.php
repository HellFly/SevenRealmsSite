
		<?php
		function up_1513619560($DB) {
			$query = '
			CREATE TABLE `page_wiki` (
				id int(11) NOT NULL,
				last_edit DATETIME,
				last_edit_by int(11),
				title TEXT,
				content TEXT
			) DEFAULT CHARSET=utf8;';
			$result = mysqli_query($DB, $query);
			if ($result) {
				$query = 'ALTER TABLE `page_wiki`
					ADD PRIMARY KEY (`id`),
					MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
					ADD CONSTRAINT `page_wiki_ibfk_1` FOREIGN KEY (`last_edit_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE;';
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
		function down_1513619560($DB) {
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
