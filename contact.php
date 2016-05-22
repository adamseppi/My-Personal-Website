<?php

session_start();

ini_set('display_errors', 1);

require_once("PHPMailerAutoload.php");

$errors = [];
$success = [];

if(isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {

	$fields = [
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'subject' => $_POST['subject'],
		'message' => $_POST['message']
	];

	foreach($fields as $field => $data) {
		if(empty($data)) {
			$errors[] = 'The ' . $field . ' field is required';
		}
	}

	if(empty($errors)) {

		$m = new PHPMailer;
		$m->isSMTP();
		$m->SMTPAuth = true;

		$m->Host = 'smtp.gmail.com';
		$m->Username = 'adamseppi@gmail.com';
		$m->Password = 'WebsitePassword!';
		$m->SMTPSecure = 'ssl';
		$m->Port = 465;

		$m->isHTML();

		$m->Subject = $fields['subject'];
		$m->Body = 'From: ' . $fields['name'] . ' - ' . $fields['email'] .  '<p>' . $fields['message'] . '</p>';

		$m->FromName = 'AdamSeppi.com';

		$m->AddAddress('adamseppi@gmail.com', 'Adam Seppi');

		if($m->send()) {
			$success = 'success';
			header('Location: contacthtml.php');
			//die();
		}
		else{
			$errors[] = 'Something went wrong. Please Try again later';
		}
	}
}
else {
	$error[] = "Something went wrong...";
}

$_SESSION['success'] = $success;
$_SESSION['errors'] = $errors;
$_SESSION['fields'] = $fields;

header('Location: contacthtml.php')
?>