
    <?php
    function up_008($DB) {
      $query = '
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
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
    function down_008($DB) {
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
    