<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Books_list = "<filtered>";
$database_Books_list = "<filtered>";
$username_Books_list = "<filtered>";
$password_Books_list = "<filtered>";
$Books_list = mysql_pconnect($hostname_Books_list, $username_Books_list, $password_Books_list) or trigger_error(mysql_error(),E_USER_ERROR);
?>