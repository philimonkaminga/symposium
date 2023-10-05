<?php
include("dbconnect.php");
$sql_get_users="SELECT 
id,
file ,
title,
	first_name,
	last_name,
	other_name,
	institution,
	email,
	id_number,
	phone_number,
	country,
	gender,
	registration_id

from user ";

$db = new db;
$db->getUsers($sql_get_users);
?>
