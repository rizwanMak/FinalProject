<?php
  /*
  * Used to create a new row in the database.
  */

  require 'authenticate.php';
  require('connect.php');

//filter and sanitize user input before user creates a new blog 
  $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
  $query = "INSERT INTO cricketblog (user, content) VALUES (:user,:content)";

  $statement = $db->prepare($query);
  
  $statement->bindValue(':user', $user);
  $statement->bindValue(':content', $content);
  
  $statement->execute();
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
  				<li><a href="index.html">Home</a></li>
  				<li><a href="#about">About</a></li>
  				<li><a href="#portfolio">Gallery</a></li>
  				<li><a href="#service">Services</a></li>
  				<li><a href="#team">Team</a></li>
  				<li class="has-dropdown"><a href="#blog">Blog</a>
  					<ul class="dropdown">
  						<li><a href="blog-single.html">blog post</a></li>
  					</ul>
  				</li>
  			</ul>
  			<!-- /Main navigation -->

  		</div>
  	</nav>
  	<!-- /Nav -->
     </header>

  	<div class="container">
  		<div id="media">
  			<form action="process_post.php" method="post">
  				<fieldset>
  					<legend><h1>Blog</h1></legend>
  					<p>
  						<label for="user">Username:</label>
  						<input name="user" id="user" />
  					</p>
  					<p>
  						<label for="content">Content:</label>
  						<textarea name="content" id="content"></textarea>
  					</p>
  					<p>
  						<input type="submit" name="command" class="btn btn-info" value="Create" />
  					</p>
  				</fieldset>
  			</form>
  		</div>
  	</div> <!-- END div id="wrapper" -->
  </body>
  </html>