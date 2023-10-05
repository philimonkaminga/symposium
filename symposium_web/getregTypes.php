<?php
include("dbconnect.php");
$sql_get_users="SELECT id,value
from registration_type ";

$db = new db;
$db->getRegTypes($sql_get_users);
?>