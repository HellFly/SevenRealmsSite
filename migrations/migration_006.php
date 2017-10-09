
    <?php
    function up_006($DB) {
      $query = '
CREATE TABLE IF NOT EXISTS `spell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `magic_school` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `name` text NOT NULL,
  `range` text NOT NULL,
  `materials` text NOT NULL,
  `duration` text NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `magic_school` (`magic_school`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
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
    function down_006($DB) {
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
    