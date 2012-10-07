<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_Books_list = "mysql13.freehostia.com";
$database_Books_list = "pedkos6_books";
$username_Books_list = "pedkos6_books";
$password_Books_list = "pedrito,";
$Books_list = mysql_pconnect($hostname_Books_list, $username_Books_list, $password_Books_list) or trigger_error(mysql_error(),E_USER_ERROR);


$hostname_Books_list = "localhost";
$database_Books_list = "booksread";
$username_Books_list = "root";
$password_Books_list = "";
$Books_list = mysql_pconnect($hostname_Books_list, $username_Books_list, $password_Books_list) or trigger_error(mysql_error(),E_USER_ERROR); 

?>