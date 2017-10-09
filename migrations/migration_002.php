
    <?php
    function up_002($DB) {
      $query = '
CREATE TABLE IF NOT EXISTS `list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
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
    function down_002($DB) {
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
    