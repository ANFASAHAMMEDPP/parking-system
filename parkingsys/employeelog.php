<?php
  session_start();
  if(!isset($_SESSION['login_admin']))
   header("location: basics.php");
 ?>
<?php

$park=$_GET['id'];

if(isset($_POST['signup-form']))
 {
     $sql="";
     if (empty($_POST['vehicleid']) || empty($_POST['cutstomeremail'])|| empty($_POST['employeeid']))
     {
        $error='yo';
     }
     else{
    // Define $username and $password
    $vehicleid = $_POST['vehicleid'];
    $cutstomeremail =$_POST['cutstomeremail'];
    $employeeid = $_POST['employeeid'];

    
   
    // mysqli_connect() function opens a new connection to the MySQL server.
    $conn = mysqli_connect("localhost", "root", "") or die(mysqli_error());
    $db_selected =mysqli_select_db($conn, "parking")  or die(mysqli_error($conn));
    // SQL query to fetch information of registerd users and finds user match.
     $sql1 = "select * from employee where eid='$employeeid' ";
     mysqli_query($conn, $sql1)  or die(mysqli_error($conn));
    $ses_sql1=mysqli_query($conn, $sql1)  or die(mysqli_error($conn)); 
    $row1 = mysqli_fetch_assoc($ses_sql1); 
    $temp=$row1['email'];

    $sql = "insert into parkings (employee,customer ,parkingspace,vehicleid) values('$temp','$cutstomeremail','$park','$vehicleid')";
     $sql2 = "UPDATE parking_space SET status = 1 WHERE parking_space.spacename = '$park' ";       
    // To protect MySQL injection for Security purpose
  //  $stmt = $conn->prepare($query);
  //  $stmt->bind_param("sssss", $username, $password,$address,$mnumber,$email);
  //  $stmt->execute();
  //  $stmt->bind_result($username, $password ,$address,$mnumber,$email);
  //  $stmt->store_result();

        mysqli_query($conn, $sql)  or die(mysqli_error($conn)); 
        mysqli_query($conn, $sql2)  or die(mysqli_error($conn));} 
    header("Location: emplolog.php");//ting To Profile Page
  }
  mysqli_close(); // Closing Connection

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="images/download.png" type="image/icon type">
    <title>Obsidian Parking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">


<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,800,900%7cRaleway:300,400,500,600,700" rel="stylesheet">
</head>
<body m-0 p-0>
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
      <li class="nav-item ">
        <a class="nav-link" href="logout.php">Logout <span class="sr-only"></span></a>
      </li>

      <li class="nav-item ">
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
        <a class="nav-link " href="#">Contact Us</a>
      </li>  
    </ul> 
  </div>
</nav>
<section class="contact pt-100 pb-100" id="contact">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 mx-auto text-center">
                  <div class="section-title mb-100">

                     <h4>Park ID : <?=$park?> </h4>
                  </div>

               </div>
            </div>
            <form class="form_bg  m-auto " style="width:40%; min-width:400px;" action="" method="post">
  <div class="form-group ">
    <label>Vehicle ID</label>
    <input type="text" class="form-control form_control" aria-describedby="emailHelp" placeholder="Vehicle ID" name="vehicleid" required>
  </div>
  <div class="form-group ">
    <label>Customer Email </label>
    <input type="email" name="cutstomeremail" class="form-control form_control" aria-describedby="emailHelp" placeholder="Customer email" required>
  </div>
   <div class="form-group">
    <label>Customer Mobile</label>
    <input type="text" name="" class="form-control form_control"  placeholder="Mobile" required>
  </div>
  <div class="form-group">
    <label>Employee ID</label>
    <input type="text" name="employeeid" class="form-control form_control"  placeholder="Employee ID" required>
  </div>
 
    <div class="d-flex justify-content-center">  <input type="submit" name="signup-form" class="btn btn-dark mr-2" value="Book">
  </div>
</form>
         </div>
         


      </section>
</body>
</html>