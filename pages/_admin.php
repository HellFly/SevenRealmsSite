<?php
	if ($ISADMIN == false) {
		header('Refresh: 0; url=' . $_SERVER['PHP_SELF']);
		exit();
	}
?>