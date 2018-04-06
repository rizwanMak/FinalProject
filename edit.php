<?php  
	/*
  * Used to edit a row in the database.
  */
	require('connect.php');

	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

	$query = "SELECT * FROM cricketblog WHERE id = $id";

	$statement = $db->prepare($query);

	$statement->execute();

	$row = $statement->fetch();

	?>

	<!DOCTYPE html>
	<html>
	<head>
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
	</head>
	<body>
		<!-- Header -->
		<header>
			<!-- Background Image -->
			<div class="bg-img" style="background-image: url('./img/background4.jpg');">
				<div class="overlay"></div>
			</div>
			<!-- /Background Image -->
			<nav id="nav" class="navbar nav-transparent">
				<div class="container">

					<div class="navbar-header">
						<!-- Logo -->
						<div class="navbar-brand">
							<a href="index.html">
								<img class="logo" src="img/logo.png" alt="logo">
								<img class="logo-alt" src="img/logo.png" alt="logo">
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
						<li><a href="index.html#contact">Contact</a></li>
					</ul>
					<!-- /Main navigation -->

				</div>
			</nav>
			<!-- /Nav -->
		</header>
			<!-- Blog -->
			<div id="blog" class="section md-padding">

				<!-- Container -->
				<div class="container">

					<!-- Row -->
					<div class="row">

						<div id="wrapper">
							<div id="wrapper">
								<div id="all_blogs">
									<form action="process_post.php" method="post">
										<fieldset>
											<legend>Edit Comment</legend>
											<p>
												<label for="user">Username</label>
												<input name="user" id="user" value="<?= $row['user'] ?>" />
											</p>
											<p>
												<label for="content">Content</label>
												<textarea name="content" id="content"><?= $row['content']?></textarea>
											</p>
											<p>
												<input type="hidden" class="btn btn-info" name="id" value=<?= $id ?> />
												<input type="submit" name="command" value="Update" />
												<input type="submit" class="btn btn-danger" name="command" value="Delete" onclick="return confirm('Are you sure you wish to delete this post?')" />
											</p>
										</fieldset>
									</form>
								</div>

							</div>
							<!-- /Row -->

						</div>
						<!-- /Container -->

					</div>
					<!-- /Blog -->
				</div> <!-- END div id="wrapper" -->
			</body>
			</html>