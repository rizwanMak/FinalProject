<?php 
session_start();

	 //require connect.php to connect to the database 
require('connect.php');

  //query to select from the table and order by the date created
  //and limiting it to 5 posts 
$query = "SELECT * FROM cricketblog";

$statement = $db->prepare($query);

$statement->execute();

// $query4 = "SELECT * FROM users";

// $statement4 = $db->prepare($query4);

// $statement4->execute();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Home</title>

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

	<link rel="stylesheet" type="text/css" href="css/registerstyle.css">

	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"> -->
	

</head>
<body>
	<!-- Header -->
	<header >
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
					<li><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#portfolio">Gallery</a></li>
					<li><a href="#service">Services</a></li>
					<li><a href="#team">Team</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a></li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->
	</header>

    <div class="container">

      <!--  <?php
       if (isset($_SESSION['message'])) {
          echo "<div id='error_msg'>".$_SESSION['message']."</div>";
          unset($_SESSION['message']);
      }

      ?> -->

      <div><h1>Welcome <?php echo $_SESSION['username']; ?></h1></div>
      <div><img src="<?= $_SESSION['image'] ?>"></div>

      <h2><?php echo $_SESSION['username']; ?> </h2>

      <table class="table table-striped table-dark">
          <thead>
             <tr>
                <th scope="col">Name</th>
                <th scope="col">Content</th>
            </tr>
        </thead>
        <?php while ($row = $statement->fetch()): ?>

         <tbody>
            <tr>
               <td>Name:<?= $row['user'] ?></td>
               <td>Content: <?= $row['content'] ?></td>
           </tr>
       </tbody>
   <?php endwhile ?>
</table>
<a href="create.php"><button type="button" class="btn btn-info">Create Blog</button></a>
<hr>

<!-- <h2>Posted Images</h2> -->

<!-- <?php while($row = $statement4->fetch()):?>

    <img src="<?=$row['image']?>" alt="" />

<?php endwhile ?> -->
<hr>
<!-- <br>
<br>
<h2>ACA Graduates</h2>

<table id="example" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Batsman/Bowler</th>
            <th>City</th>
            <th>Age</th>
            <th>Start Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>Batsman</td>
            <td>Edinburgh</td>
            <td>29</td>
            <td>2011/04/25</td>
        </tr>
        <tr>
            <td>Garrett Winters</td>
            <td>Batsman</td>
            <td>Mumbai</td>
            <td>28</td>
            <td>2011/07/25</td>
        </tr>
        <tr>
            <td>Ashton Cox</td>
            <td>Batsman</td>
            <td>San Francisco</td>
            <td>26</td>
            <td>2009/01/12</td>
        </tr>
        <tr>
            <td>Cedric Kelly</td>
            <td>Bowler</td>
            <td>Winnipeg</td>
            <td>32</td>
            <td>2012/03/29</td>
        </tr>
        <tr>
            <td>Airi Satou</td>
            <td>Bowler</td>
            <td>Toronto</td>
            <td>33</td>
            <td>2008/11/28</td>
        </tr>
        <tr>
            <td>Brielle Williamson</td>
            <td>Bowler</td>
            <td>New York</td>
            <td>39</td>
            <td>2012/12/02</td>
        </tr>
        <tr>
            <td>Herrod Chandler</td>
            <td>Batsman</td>
            <td>Regina</td>
            <td>36</td>
            <td>2012/08/06</td>
        </tr>
        <tr>
            <td>Rhona Davidson</td>
            <td>Bowler</td>
            <td>Houston</td>
            <td>42</td>
            <td>2010/10/14</td>
        </tr>
        <tr>
            <td>Colleen Hurst</td>
            <td>Bowler</td>
            <td>Mumbai</td>
            <td>39</td>
            <td>2009/09/15</td>
        </tr>
        <tr>
            <td>Rizwan Maknojiya</td>
            <td>Batsman</td>
            <td>Mumbai</td>
            <td>27</td>
            <td>2008/12/13</td>
        </tr>
        <tr>
            <td>Ivan</td>
            <td>Bowler</td>
            <td>Uganda</td>
            <td>24</td>
            <td>2012/08/06</td>
        </tr>
        <tr>
            <td>Rhona Davidson</td>
            <td>Batsman</td>
            <td>Sydney</td>
            <td>17</td>
            <td>2010/10/14</td>
        </tr>
        <tr>
            <td>Saijil</td>
            <td>Bowler</td>
            <td>Mumbai</td>
            <td>28</td>
            <td>2009/09/15</td>
        </tr>
        <tr>
            <td>Sonya Frost</td>
            <td>Batsman</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Batsman/Bowler</th>
            <th>City</th>
            <th>Age</th>
            <th>Start Date</th>
        </tr>
    </tfoot>
</table>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

<script type="text/javascript">
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        'copy'
        ]
    } );

</script> -->
</div>

</header>
</body>
</html>