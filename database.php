<?php
require_once('include.php');

$current_migration = 0;
if (file_exists($MIGRATIONPATH . 'migration.txt')) {
	$f = fopen($MIGRATIONPATH . 'migration.txt', 'r');
	$current_migration = fgets($f);
	fclose($f);
}

// http://php.net/manual/en/reserved.variables.argv.php
// usable from cmd and browser, store arguments in $_GET
if (isset($argv)) {
	foreach ($argv as $arg) {
		if ($arg != basename(__FILE__)) {
			$e=explode('=',$arg);
			if(count($e)==2)
				$_GET[$e[0]]=$e[1];
			else
				$_GET[$e[0]]=0;
		}
	}
}

$command = key($_GET);

switch ($command) {
	case 'create':
		$current_time = time();
		echo $MIGRATIONPATH . 'migration_' . $current_time . '.php created' . chr(0x0D).chr(0x0A);
		$file = fopen($MIGRATIONPATH . 'migration_' . $current_time . '.php', 'w');
		fwrite($file, '
		<?php
		function up_' . $current_time . '($DB) {
			$query = \'SELECT * FROM user\';
			$result = mysqli_query($DB, $query);
			if ($result) {
				return true;
			}
			else {
				echo mysqli_error($DB);
				return false;
			}
		}
		function down_' . $current_time . '($DB) {
			$query = \'SELECT * FROM user\';
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
		');
		fclose($file);
	break;
	case 'migrate':
		$current_time = time();
		$last_applied = -1;
		$files = scandir($MIGRATIONPATH);
		foreach ($files as $filename) {
			if ($filename != '.' && $filename != '..' && $filename != 'migration.txt') {
				$migration_time = str_replace('migration_', '', str_replace('.php', '', $filename));
				if (intval($migration_time) > $current_migration) {
					include $MIGRATIONPATH . $filename;
					if (call_user_func('up_' . $migration_time, $DB) == true) {
						echo 'Applied migration ' . $migration_time . chr(0x0D).chr(0x0A);
					}
					$last_applied = $migration_time;
				}
			}
			if ($last_applied != -1) {
				$f = fopen($MIGRATIONPATH . 'migration.txt', 'w');
				fwrite($f, $last_applied);
				fclose($f);
			}
		}
	break;
	case null:
	default:
		echo 'Usage: php ' . basename(__FILE__) . ' <action>' . chr(0x0D).chr(0x0A);
		echo '	Actions: create, migrate' . chr(0x0D).chr(0x0A);
	break;
}
?>
