
    <?php
    function up_001($DB) {
      $query = '
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `name` text NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
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
    function down_001($DB) {
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
    