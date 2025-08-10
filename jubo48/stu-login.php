<?php
include('admin/includes/conn.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	function check_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$email = check_input($_POST['email']);
	$password = check_input($_POST['password']);
	$fpassword = md5($password);

	$errors = [];
	$old_input = ['email' => $email];

	// Email validation
	if (!preg_match("/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/", $email)) {
		$errors['email'] = "Incorrect email";
	} else {
		$check_email = mysqli_query($con, "SELECT * FROM `student_user` WHERE email='$email'");
		if (mysqli_num_rows($check_email) == 0) {
			$errors['email'] = "Incorrect email";
		} else {
			$user = mysqli_fetch_array($check_email);
			if ($user['password'] != $fpassword) {
				$errors['password'] = "Incorrect password";
			} else {
				if ($user['access_level'] == "10") {
					$_SESSION['id'] = $user['userid'];
					header("Location: student-panel/");
					exit();
				} else {
					$errors['password'] = "Access denied!";
				}
			}
		}
	}

	if (!empty($errors)) {
		$_SESSION['login_errors'] = $errors;
		$_SESSION['old_input'] = $old_input;
		header("Location: student-login.php");
		exit();
	}
}
?>
