<?php
include('indexlogin.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: profile.php"); // Redirecting To Profile Page
}
if (isset($_POST['yo']))
 {
 	 session_start();
 	 if(isset($_SESSION['login_admin'])){
    header("location: empolog.php"); // Redirecting To Profile Page
    }

     $sql="";
    // Define $username and $password

    $email =$_POST['ademail'];
    $password = $_POST['adpassword'];
    // mysqli_connect() function opens a new connection to the MySQL server.
    $conn = mysqli_connect("localhost", "root", "") or die(mysqli_error());
    $db_selected =mysqli_select_db($conn, "parking")  or die(mysqli_error($conn));
    // SQL query to fetch information of registerd users and finds user match.
    $sql = "select * from employee where email='$email' and password='$password' ";

    $ses_sql=mysqli_query($conn, $sql)  or die(mysqli_error($conn)); 
    $row = mysqli_fetch_assoc($ses_sql);
    if($email==$row['email'] and $password==$row['password'])
    	{
    		header("Location: emplolog.php");
    $_SESSION['login_admin'] = $email;
}
    else
    {
       session_destroy(); // Destroying All Sessions {
      header("Location: basics.php"); //ting To Profile Page
    }
  mysqli_close(); // Closing Connection
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="image/download.png" type="image/icon type">
	<title>Home-Obsidian Parking</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	
     <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand " href="#"><i class="fa fa-car icon" aria-hidden="true"></i>OBSIDIAN PARKING</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto ">

      <li class="nav-item active">
        <a class="nav-link" href="basics.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="layout.php">Availability</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="https://goo.gl/maps/HirkP93EwZmrLwJQ6" target="_blank">Location</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="prices.php">Prices</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="connect.php">Contact Us</a>
      </li>  
    </ul> 
  </div>
</nav>
<section>

	<div class="jumbotron section-1">
		<div class="container mt-5 text-white "p-5>	
	 		<form class="form_bg  m-auto" style="width:40%; min-width:400px;" action="indexlogin.php" method="post">
				<div class="form-group ">
					<label>Email address</label>
					<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control"  name="password" placeholder="Password" required>
				</div>
				<div class="d-flex justify-content-center">  
					<input type="submit" name="submit" class="btn btn-dark mr-2" value="Submit">
					<a href="signup.php"><button type="button" class="btn btn-dark ml-2">Register</button></a>
				</div>
			</form>
		</div>
	</div>
	
	<div class="jumbotron section-2 footer_color">
		
			<div class="row  justify-content-center ">
	<div class=" cl-md-6 cl-lg-3 m-3 trans">
		<div class="card" style="width: 18rem; background-color:white;
	">
	<div class="card-body">
	<h5 class="card-titlep-3" style="height:5rem; "><i class="fa fa-car" aria-hidden="true"></i> COMFORTABLE PARKING SPACES</h5>

	<p class="card-text">Seperate parking spaces for two-wheelers, light-motor vehicles and heavy-motor vehicles.</p>

	</div>
	</div>
	</div>

	<div class="cl-md-6 cl-lg-3 m-3 trans">
		<div class="card" style="width: 18rem; background-color:white;
	">
	<div class="card-body">
	<h5 class="card-titlep-3" style="height:5rem; " style="font-size: "><i class="fa fa-credit-card" aria-hidden="true"></i> GREAT DAILY & HOURLY RATES</h5>

	<p class="card-text">Low rates that no one else can give on hourly, daily and mothly basis.</p>

	</div>
	</div>
	</div>
	<div class="cl-md-6 cl-lg-3 m-3 trans">
		<div class="card" style="width: 18rem; background-color:white;
	">
	<div class="card-body">
	<h5 class="card-titlep-3" style="height:5rem; "><i class="fa fa-handshake-o" aria-hidden="true"></i> NO HIDDEN CHARGES</h5>

	<p class="card-text">We only charge you for the time and extras. No unexpected charges.</p>

	</div>
	</div>
	</div>
	<div class="cl-md-6 cl-lg-3 m-3 trans">
		<div class="card" style="width: 18rem; background-color:white;
	">
	<div class="card-body">
	<h5 class="card-titlep-3" style="height:5rem; "><i class="fa fa-cog" aria-hidden="true"></i> FULL SET OF EXTRA SERVICES</h5>

	<p class="card-text">Whole variety of extra services by experts available at affordable costs.</p>

	</div>
	</div>
	</div>

	</div>
		
	</div>
	</div>
	</div>
	<div class="jumbotron section-2">
		<div class="container  ">
			<div class="card color_red1 ">
	<h5 class="card-header align_center color_red">HOT OFFER</h5>
	<div class="card-body ">
	<h5 class="card-title align_center">REGISTER FOR FREE</h5>
	<p class="card-text align_center">Comfortable Parking Spaces, Great Daily and Hourly Rates, No Hidden Charges & Full set of Extra Services</p>


	</div>
	<div class="card-body align_center">


	<a href="
	" class="btn btn-dark m-auto p-auto">Register</a>

	</div>
	</div>

</section>




<section id="footer" class="footer_color text-white p-4">
		<div class="container ">
			<div class="row text-center text-xs-center text-sm-left text-md-left p-3 d-flex justify-content-space-around">
				<div class="col-xs-12 col-sm-4 col-md-4 align_center">
					<h5>ADDRESS</h5>
					<ul class="list-unstyled quick-links">
						<li>UNITS 3 & 4, LINKS AVENUE NORTH</li>
						<li>EAGLE FARM, QUEENSLAND</li>
						<li>4009, AUSTRALIA</li>
						<li>+91-999-999-9999</li>
						
						
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 align_center">
					<h5>LINKS</h5>
					<ul class="list-unstyled quick-links ">
						<li><a href="#">HOME</a></li>
						<li><a href="layout.php">AVAILABILITY</a></li>
						<li><a href="https://goo.gl/maps/HirkP93EwZmrLwJQ6" target="_blank">LOCATION</a></li>
						<li><a href="prices.php">PRICES</a></li>
						<li><a href="connect.php">CONTACCT</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 ">
					<h5 style="margin-bottom:3px;" class="align_center">ADMIN LOGIN</h5>
					<form  action=" " method="post" >
  <div class="formgroup ">
    <label style="margin:0;">Email address</label>
    <input type="email" class="form-control" name="ademail"aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="formgroup">
    <label style="margin:0;">Password</label>
    <input type="password" class="form-control" name="adpassword" placeholder="Password" required>
  </div> 
    <div class="d-flex justify-content-center">  <button style="margin-top:2px;" type="submit " name="yo" class="btn btn-sm btn-dark mr-2">Submit</button>
  </div>
</form>
				</div>
			</div>
			<div class="row contact-footer d-flex justify-content-center " style="height:10px">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5 ">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
						
						
					</ul>
				</div>
				</hr>
			</div>	
				
		</div>
	</section>
	<!-- ./Footer -->

</body>
</html>