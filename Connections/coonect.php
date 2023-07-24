<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_coonect = "localhost";
$database_coonect = "ekursus";
$username_coonect = "root";
$password_coonect = "kambing";
$coonect = mysql_pconnect($hostname_coonect, $username_coonect, $password_coonect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>