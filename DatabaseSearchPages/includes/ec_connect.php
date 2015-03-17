<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_DatabaseServer = "impa.valdosta.edu";
$database_DatabaseServer = "extra_credit";
$username_DatabaseServer = "archives_web";
$password_DatabaseServer = "uhCs4fQpr";
$DatabaseServer = mysql_pconnect($hostname_DatabaseServer, $username_DatabaseServer, $password_DatabaseServer) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
