<?php
$host="localhost";
$db_user="root";
$db_pass="adminzrg";
$db_name="test";
$timezone="Asia/Shanghai";

$link=mysqli_connect($host,$db_user,$db_pass,$db_name);
// mysql_select_db($db_name,$link);
mysqli_query($link,"SET names UTF8");

header("Content-Type: text/html; charset=utf-8");

