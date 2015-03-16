<?php
	$dbhost = 'impa.valdosta.edu';
	$dbuser = 'archives';
	$dbpassword = 'tqBXsZwR2QnL2qFY';
	$dbname = 'extra_credit';

	mysql_connect($dbhost, $dbuser, $dbpassword) or die ('Error connecting to mysql');
	mysql_select_db($dbname);

?>