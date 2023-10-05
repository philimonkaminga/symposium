<?php
include("dbconnect.php");

//user
$title = $_POST["title"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$other_name = $_POST["other_name"];
$institution = $_POST["institution"];
$email = $_POST["email"];
$id_number = $_POST["id_number"];
$phone_number = $_POST["phone_number"];
$country = $_POST["country"];
$gender = $_POST["gender"];
$registration_id = $_POST["registration_id"];
$filee = "fileurl";

//student

$level_of_study = $_POST['level_of_study'];
$supervisor_name = $_POST['supervisor_name'];
$supervisor_affiliation = $_POST['supervisor_affiliation'];
$supervisor_contact = $_POST['supervisor_contact'];


$sql_insert_user = "INSERT INTO user (
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

) VALUES (
    '$title',
	'$first_name',
	'$last_name',
	'$other_name',
	'$institution',
    '$email',
	'$id_number',
	'$phone_number',
	'$country',
	'$gender',
	'$registration_id'
)";


$db = new db;

$result = $db->insertUser($sql_insert_user, $registration_id, $filee);
$last_id = $result["id"];

if ($result["type"] == "student") {

    $sql_insert_student = "INSERT INTO student (
        user_id,
            level_of_study,
            supervisor_name,
            supervisor_affiliation,
            supervisor_contact
    
    ) VALUES (
        '$last_id',
            '$level_of_study',
            '$supervisor_name',
            '$supervisor_affiliation',
            '$supervisor_contact'
            
    )";

    $db->insertStudent($sql_insert_student);
}
?>