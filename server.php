<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
include 'config.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form

  
  $username = 'DB_NAME' . $_POST['username'];
  $email = 'DB_NAME' . $_POST['email'];
  $password_1 = 'DB_NAME' . $_POST['password_1'];
  $password_2 = 'DB_NAME' . $_POST['password_2'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Vul een naam in"); }
  if (empty($email)) { array_push($errors, "Vul Email in"); }
  if (empty($password_1)) { array_push($errors, "Vul wachtwoord in"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Wachtwoorden zijn niet het zelfde");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = 'DB_NAME' . $user_check_query;
  $user = $result;

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Deze naam word al gebruikt");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Dit email adres word al gebruikt");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password)
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query('DB_NAME', $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Je bent ingelogd!";
  	header('location: index.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = 'DB_NAME' . $_POST['username'];
  $password = 'DB_NAME' . $_POST['password'];

  if (empty($username)) {
  	array_push($errors, "Vul naam in");
  }
  if (empty($password)) {
  	array_push($errors, "Vul wachtwoord in");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = 'DB_NAME' . $query;
  	if ($results == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Je bent nu ingelogd!";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Naam/wachtwoord klopt niet");
  	}
  }
}

?>
