
    <?php
    function up_009($DB) {
      $query = '
ALTER TABLE `list_item`
  ADD CONSTRAINT `list_item_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `list` (`id`) ON UPDATE CASCADE;
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
    function down_009($DB) {
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
    