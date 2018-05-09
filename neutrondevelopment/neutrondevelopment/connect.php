<?php

session_start();

// variable declaration

// ID Variables

$_SESSION['success'] = "";

$name = "";

$email = "";

$comment = "";

$staffname = "";

$staffpassword = "";

// connect to database

$db = mysqli_connect('', '', '', '');

//Add Query

if (isset($_POST['submit_comment'])) {

	$name = mysqli_real_escape_string($db, $_POST['name']);

	$email = mysqli_real_escape_string($db, $_POST['email']);

	$comment = mysqli_real_escape_string($db, $_POST['comment']);

	if (empty($name)) { array_push($errors, "Error"); }

	if (empty($email)) { array_push($errors, "Error"); }

	if (empty($comment)) { array_push($errors, "Error"); }

	if (count($errors) == 0) {

		$query = "INSERT INTO comments (name, email, comment)

		VALUES('$name', '$email', '$comment')";

		mysqli_query($db, $query);
	}
}

// This is the login PHP

if (isset($_POST['login_user'])) {

	$staffname = mysqli_real_escape_string($db, $_POST['staffname']);

	$staffpassword = mysqli_real_escape_string($db, $_POST['staffpassword']);



	if (empty($staffname)) {

		array_push($errors, "username is required");

	}

	if (empty($staffpassword)) {

		array_push($errors, "Password is required");

	}



	if (count($errors) == 0) {

		$staffpassword = ($staffpassword);

		$query = "SELECT * FROM accounts WHERE staffname='$staffname' AND staffpassword='$staffpassword'";

		$results = mysqli_query($db, $query);



		if (mysqli_num_rows($results) == 1) {

			$_SESSION['success'] = "$staffname";

			header('location: backend.php');

		}else {

			array_push($errors, "Wrong username/password combination");

		}

	}

}

?>
