<?php
  /*
  * Used to create a new row in the database.
  */

  require('connect.php');

//filter and sanitize user input before user creates a new blog 
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
  $query = "INSERT INTO contact (name, email, message) VALUES (:name,:email,:message)";

  $statement = $db->prepare($query);
  
  $statement->bindValue(':name', $name);
  $statement->bindValue(':email', $email);
  $statement->bindValue(':message', $message);

  $statement->execute();
  ?>

<!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  	<title>Sports Academy</title>

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

  	<!-- <link type="text/css" rel="stylesheet" href="css/login.css" /> -->
  	<title>Contact</title>
  	<!-- <link rel="stylesheet" href="style.css" type="text/css"> -->
  </head>
  <body>
  	<!-- Header -->
	<header>
  	<!-- Background Image -->
  	<div class="bg-img" style="background-image: url('./img/background4.jpg');">
  		<div class="overlay"></div>
  	</div>
  	<!-- /Background Image -->
  	<!-- Nav -->
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
  				<li><a href="index.html">Home</a></li>
  				<li><a href="#about">About</a></li>
  				<li><a href="#portfolio">Gallery</a></li>
  				<li><a href="#service">Services</a></li>
  				<li><a href="#team">Team</a></li>
  				<li><a href="login.php"><button type="button" class="btn btn-info">Login</button></a></li>
  			</ul>
  			<!-- /Main navigation -->

  		</div>
  	</nav>
  	<!-- /Nav -->
  </header>

<!-- Contact -->
	<div id="contact" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section-header -->
				<div class="section-header text-center">
					<h2 class="title">Get in touch</h2>
				</div>
				<!-- /Section-header -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-phone"></i>
						<h3>Phone</h3>
						<p>204-421-3940</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-envelope"></i>
						<h3>Email</h3>
						<p>ACA@gmail.com</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-map-marker"></i>
						<h3>Address</h3>
						<p>250 Scotland Ave</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact form -->
				<div class="col-md-8 col-md-offset-2">
					<form class="contact-form" action="#" method="post">
						<input name="name" id="name" type="text" class="input" placeholder="Name" required/>
						<input name="email" id="email" type="email" class="input" placeholder="Email" required />
						<textarea name="message" id="message" class="input" placeholder="Message"></textarea>
						<button class="main-btn">Send message</button>
						
					</form>
				</div>
				<!-- /contact form -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Contact -->

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
	<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.1/classic/ckeditor.js"></script>
	<script>
        ClassicEditor
            .create( document.querySelector( '#message' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

</body>

</html>
