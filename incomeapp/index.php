<?php
require('model/dbConnect.php');
include('model/userDatabase.php');
include('model/user_data.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
	$action = filter_input(INPUT_GET, 'action');
	if ($action == NULL) {
		$action = 'main';
		}
}

switch ($action) {
	case 'main':
		include('main.php');
		break;
	case 'show_login':
		if (isset($_SESSION['user'])) {
			$email = $_SESSION['user'];
			include('add_entry_form.php');
		} else {
			include('login_form.php');
		}
		break;
	case 'loginUser':
		$email = filter_input(INPUT_POST, 'email');
		$password = filter_input(INPUT_POST, 'password');
		$email = htmlspecialchars(strtolower($email));
		$password = htmlspecialchars($password);
		$valid_password = userVerify($email, $password);
		if ($valid_password) {
			$_SESSION['user'] = $email;
			include('add_entry_form.php');
		} else {
			$error_message = 'The email or password you entered is incorrect';
			include('login_form.php');
		}
		break;
	case 'show_signup':
		include('signup_form.php');
		break;
	case 'addUser':
		$email = filter_input(INPUT_POST, 'email');
		$password = filter_input(INPUT_POST, 'password');
		$confirmPassword = filter_input(INPUT_POST, 'confirm-password');
		$email = htmlspecialchars(strtolower($email));
		$password = htmlspecialchars($password);
		$confirmPassword = htmlspecialchars($confirmPassword);
		if (confirmPassword($password, $confirmPassword)) {
			$checkUser = checkUsers($email);
			if (empty($checkUser)) {
				addUser($email, $password);
				$_SESSION['user'] = $email;
				$error_message = "Welcome $email. Thanks for using our App.";
				include('add_entry_form.php');
			} else {
				$error_message = "Email is already in use";
				include('signup_form.php');
			}
		} else {
			$error_message = "Password confirm did not match";
			include('signup_form.php');
		}
		break;
	case 'logout':
		session_destroy();
		include('login_form.php');
		break;
	case 'add_entry':
		$email = $_SESSION['user'];
		$location = filter_input(INPUT_POST, 'location');
		$miles = filter_input(INPUT_POST, 'miles', FILTER_VALIDATE_FLOAT);
		$standardPay = filter_input(INPUT_POST, 'standard_pay', FILTER_VALIDATE_FLOAT);
		$tips = filter_input(INPUT_POST, 'tips', FILTER_VALIDATE_FLOAT);
		$hiredLabor = filter_input(INPUT_POST, 'hired_labor', FILTER_VALIDATE_FLOAT);
		$laborFactor = filter_input(INPUT_POST, 'labor_factor', FILTER_VALIDATE_FLOAT);
		$expenses = filter_input(INPUT_POST, 'expenses', FILTER_VALIDATE_FLOAT);
		$notes = filter_input(INPUT_POST, 'notes');
		addEntry($email, $location, $miles, $standardPay, $tips, $hiredLabor, $laborFactor, $expenses, $notes);
		$message = "Entry Added";
		include('add_entry_form.php');
		break;
	case 'show_about':
		include('about.php');
		break;
	case 'show_add_location':
		include('add_location_form.php');
		break;
	case 'add_location':
		$email = $_SESSION['user'];
		$location = filter_input(INPUT_POST, 'location');
		$location = ucwords($location);
		addLocation($email, $location);
		include('add_entry_form.php');
		break;
	case 'show_entry_form':
		$email = $_SESSION['user'];
		include('add_entry_form.php');
		break;
	default:
		echo "An error has occured.";
		break;
}


 ?>
