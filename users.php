<?php



  //require connect.php to connect to the database 
require('connect.php');

$searchresult = "";

if(isset($_POST['searchresult'])){
	$searchresult = $_POST['searchresult'];
}

   //query to select from the table 
$query = "SELECT * FROM users WHERE username LIKE '$searchresult%' or email LIKE '$searchresult%'" or die ("could not search!");

$statement = $db->prepare($query);

$statement->execute();


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Message</title>

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
					<li><a href="admin.php"><button type="button" class="btn btn-info">back</button></a></li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

	</header>
	<!-- /Header -->

	<!-- Blog -->
	<div id="blog" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Main -->
				<main id="main" class="col-md-9">
					<div class="blog">
						<div class="blog-content">
							<form action="#" method="POST">
								<label>Search User</label>
								<input type="text" name="searchresult">
								<input type="submit" name="submit">
								<a href="users.php"><button type="button" class="btn btn-info">All users</button>
								</a>
							</form>
							<br>

							<h1><i class="fa fa-user"></i> <?= $statement->rowCount() ?> Users</h1>
							<table class="table table-striped table-dark">
								<thead>
									<tr>
										<th scope="col">Name</th>
										<th scope="col">Email</th>
										<th scope="col">Profile Picture</th>
									</tr>
								</thead>
								<?php while ($row = $statement->fetch()): 

								?>

								<tbody>
									<tr>
										<td>Name:<?= $row['username'] ?></td>
										<td>Email: <?= $row['email'] ?></td>
										<td>Profile Picture:<img src="<?=$row['image']?>" alt="" /></td>
										<td class="btn btn-danger" name="command" value="Delete" onclick="return confirm('Are you sure you wish to delete this user?')" /></td>
									</tr>
								</tbody>

							<?php endwhile ?>

						</table>

					</div>
				</div>
				<!-- /Row -->

			</div>
			<!-- /Container -->

		</div>
		<!-- /Blog -->

		<!-- Footer -->
		<footer id="footer" class="sm-padding bg-dark">

			<!-- Container -->
			<div class="container">

				<!-- Row -->
				<div class="row">

					<div class="col-md-12">

						<!-- footer logo -->
						<div class="footer-logo">
							<a href="index.html"><img src="img/logo.png" alt="logo"></a>
						</div>
						<!-- /footer logo -->

						<!-- footer follow -->
						<ul class="footer-follow">
							<li><a href="https://www.facebook.com/CricketACT/"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/cricketact"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.instagram.com/cricketact/"><i class="fa fa-instagram"></i></a></li>
						</ul>
						<!-- /footer follow -->

						<!-- footer copyright -->
						<div class="footer-copyright">
							<p>Copyright © 2018. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">Rizwan Maknojiya</a></p>
						</div>
						<!-- /footer copyright -->

					</div>

				</div>
				<!-- /Row -->

			</div>
			<!-- /Container -->

		</footer>
		<!-- /Footer -->

		<!-- Back to top -->
		<div id="back-to-top"></div>
		<!-- /Back to top -->

		<!-- Preloader -->
		<div id="preloader">
			<div class="preloader">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<!-- /Preloader -->

		<!-- jQuery Plugins -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		

	</body>

	</html>
