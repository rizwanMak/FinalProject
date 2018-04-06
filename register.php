<?php 

session_start();


	//connect to database
require('connect.php');
include('imageFiltering.php');

    include('php-image-resize-master/lib/ImageResize.php');

    use \Gumlet\ImageResize;


if (isset($_POST['register_btn'])) {

	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	//$image =filter_input(INPUT_POST, 'image', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	
	$imageDirectory= '';

	//$imageFileType = strtolower(pathinfo($imageDirectory, PATHINFO_EXTENSION));

	//move_uploaded_file($_FILES['image']['tmp_name'], $imageDirectory);

	if ($password == $password2) {
			//create user
			$password = password_hash($password, PASSWORD_DEFAULT); //hash password before storing for security

			if(isset($_FILES['image']))
              {

                  $imageShortName = $_FILES['image']['name'];
                  $image_tmp = $_FILES['image']['tmp_name'];
                  $newPath = upload_path($imageShortName);

                  if(file_is_an_image($image_tmp, $newPath))
                  {
                      $imageDirectory = "uploads/" . pathinfo($newPath, PATHINFO_BASENAME);
                      $image = new ImageResize($image_tmp);
                      $image->resize(200,200);
                      $image->save($image_tmp);
                      move_uploaded_file($image_tmp, $imageDirectory);
                  }
              }

			$query = "INSERT INTO users (username, email, password, image) VALUES (:username,:email,:password,:image)";

			$statement = $db->prepare($query);
			
			$statement->bindValue(':username', $username);
			$statement->bindValue(':email', $email);
			$statement->bindValue(':password', $password);
			$statement->bindValue(':image', $imageDirectory);
			//$statement->bindValue(':image', base64_encode());

			$statement->execute();

			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			$_SESSION['image'] = $imageDirectory;
			header("location: home.php");
			exit();
		}else{
			$_SESSION['message'] = "The two password do not match";

		}
	}

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Register</title>
		<!-- <link rel="stylesheet" type="text/css" href="css/registerstyle.css"> -->
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
						<li><a href="login.php"><button type="button" class="btn btn-info">Login</button></a></li>
					</ul>

					<!-- /Main navigation -->
				</div>
			</nav>
			<!-- /Nav -->
		</header>

		<div class="container">
			
			<h1>Register</h1>
			<div class="error_msg">

			<?php
			if (isset($_SESSION['message'])) {
				echo "<div id='error_msg'>".$_SESSION['message']."</div>";
				unset($_SESSION['message']);
			}

			?>
			</div>


			<form method="post" action="register.php" enctype="multipart/form-data" onsubmit="return checkForm(this);">
				<table>
					<tr>
						<td>Username:</td>
						<td><input type= "text" name="username" class="textInput" required/></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type= "email" name="email" class="textInput" required/></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type= "password" name="password" class="textInput" required/></td>
					</tr>
					<tr>
						<td>Confirm Password:</td>
						<td><input type= "password" name="password2" class="textInput"></td>
					</tr>
					<tr>
						<td>Captcha: </td>
						<td><p><img src="captcha.php" width="120" height="30" border="1" alt="CAPTCHA"></p>
							<p><input type="text" size="6" maxlength="5" name="captcha" value="" required/><br>
								<small>copy the digits from the image into this box</small></p></td>
							</tr>
							<tr>
						<td>Upload Image:</td>
						<td><input type= "file" name="image" class="textInput"></td>
					</tr>
							<tr>
								<td></td>
								<td><input type= "submit" name=" register_btn" class="btn btn-info" value="Register"></td>
							</tr>
						</table>
					</form>

					<br>
					<br>
					<h3>Already a User? Please login</h3>
					<a href="registerlogin.php"><button class="btn btn-info">Login</button></a>
				</div>
				<script type="text/javascript">

					function checkForm(form)
					{

						if(!form.captcha.value.match(/^\d{5}$/)) {
							alert('Please enter the CAPTCHA digits in the box provided');
							form.captcha.focus();
							return false;
						}

						return true;
					}

				</script>
			</body>
			</html>