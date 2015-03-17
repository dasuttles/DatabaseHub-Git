<?php
	$dbhost = 'impa.valdosta.edu';
	$dbuser = 'archives_web';
	$dbpassword = 'uhCs4fQpr';
	$dbname = 'extra_credit';

	mysql_connect($dbhost, $dbuser, $dbpassword) or die ('Error connecting to mysql');
	mysql_select_db($dbname);

?>
