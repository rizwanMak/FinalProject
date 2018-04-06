<?php 
session_start();


	//connect to database
require('connect.php');

if (isset($_POST['login_btn'])) {

	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

	$query = "SELECT * FROM users WHERE username = '$username' ";
	$statement = $db->prepare($query);

	$statement->execute();
	$row = $statement->fetch();

	

	if ($statement->rowCount() == 1 && password_verify($password,$row['password'])) {
		$_SESSION['message'] = "You are now logged in";
		$_SESSION['username'] = $username;
		$_SESSION['image'] = $row['image'];
		$_SESSION['usertype'] = $row['usertype'];

		if ($row['usertype'] == 1) {
			header("location: admin.php");
		}
		else{
			header("location: home.php");
		}
		
	}
	else{

		$_SESSION['message'] = "Username/password combination incorrect";
	}

}
?>


<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="css/registerstyle.css"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>login</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />


	<link type="text/css" rel="stylesheet" href="css/login.css" />
</head>
<body>
	<!-- Header -->
	<header>

		<!-- Nav -->
		<nav id="nav" class="navbar">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="index.html">
							<img class="logo" src="img/logo.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="index.html#home">Home</a></li>
					<li><a href="index.html#about">About</a></li>
					<li><a href="index.html#service">Services</a></li>
					<li><a href="index.html#team">Team</a></li>
					<li><a href="contact.php">Contact</a>
					</li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->
	</header>

	<div class="container">


		<div class="header">
			<h1>Login</h1>
		</div>

		<div class="error_msg">

		<?php
		if (isset($_SESSION['message'])) {
			echo "<div id='error_msg'>".$_SESSION['message']."</div>";
			unset($_SESSION['message']);
		}

		?>
	</div>

		<form method="post" action="registerlogin.php">
			<table>
				<tr>
					<td>Username :</td>
					<td><input type= "text" name="username" class="textInput" required/></td>
				</tr>
				<tr>
					<td>Password :</td>
					<td><input type= "password" name="password" class="textInput" required/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type= "submit" class="btn btn-info" name="login_btn" value="Login"></td>
				</tr>
			</table>
		</form>
		<br>
		<br>
		<h3>New User? Please register</h3>
		<a href="register.php"><button  class="btn btn-info">Register</button></a>

	</div>
</body>
</html>