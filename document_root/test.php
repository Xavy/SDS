<?php

$link = mysql_connect('127.0.0.1', 'root', 'root');
mysql_select_db('sds',$link);
var_dump(mysql_query("INSERT INTO event VALUES(NULL,'adsa',NULL,NULL,NULL,NULL,NULL)",$link));
echo mysql_error();
mysql_close($link);