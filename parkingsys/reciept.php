<?php
  session_start();
  if(!isset($_SESSION['login_admin']))
   header("location: basics.php");
 ?>
<?php

     $park=$_GET['id'];
     
     $conn = mysqli_connect("localhost", "root", "") or die(mysqli_error());
    $db_selected =mysqli_select_db($conn, "parking")  or die(mysqli_error($conn));
    // SQL query to fetch information of registerd users and finds user match.
  $sql3 = "select * from parkings where parkingspace='$park' ";

    $ses_sql3=mysqli_query($conn, $sql3)  or die(mysqli_error($conn)); 
    $row3 = mysqli_fetch_assoc($ses_sql3);
    $email=$row3['customer'];


    $sql = "select * from customer where email='$email' ";

    $ses_sql=mysqli_query($conn, $sql)  or die(mysqli_error($conn)); 
    $row = mysqli_fetch_assoc($ses_sql);

    $sql1 = "select * from parkings where customer='$email' ";

    $ses_sql1=mysqli_query($conn, $sql1)  or die(mysqli_error($conn)); 
    $row1 = mysqli_fetch_assoc($ses_sql1);

    $employee=$row1['employee'];
    $customer=$row1['customer'];
    $parkingspace=$row1['parkingspace'];
    $parkedtime=$row1['parkedtime'];
    $vehicleid=$row1['vehicleid'];

    $sql2 = "select * from employee where email='$row1[employee]' ";

    $ses_sql2=mysqli_query($conn, $sql2)  or die(mysqli_error($conn)); 
    $row2 = mysqli_fetch_assoc($ses_sql2);


  $sql7 = "select TIMESTAMPDIFF(HOUR,parkedtime,CURRENT_TIMESTAMP()) as a from parkings where parkingspace='$park'  ";

    $ses_sql7=mysqli_query($conn, $sql7)  or die(mysqli_error($conn)); 
    $row7 = mysqli_fetch_assoc($ses_sql7);


  
   if (isset($_POST['submit']))
{   

$sql6 = "insert into parkingshis (employee,customer ,parkingspace,parkedtime,vehicleid) values('$employee','$customer' ,'$parkingspace','$parkedtime','$vehicleid') ";

    mysqli_query($conn, $sql6)  or die(mysqli_error($conn)); 
  $sql5 = "DELETE FROM parkings WHERE parkingspace='$park' ";

    mysqli_query($conn, $sql5)  or die(mysqli_error($conn)); 
  $sql4 = "UPDATE parking_space SET status = 0 WHERE parking_space.spacename = '$park' ";
   mysqli_query($conn, $sql4)  or die(mysqli_error($conn));
   header("Location: emplolog.php");
}  

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
<body class="m-0 p-0">
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

<section class="contact pt-100 pb-100 align_center" id="contact" style="width:100%">
         <div class="container m-auto p-auto" style="width:100%">
            <div class="row">
               <div class="col-xl-6 mx-auto text-center">
                  <div class="section-title mb-100">
                  
                     <h4>customer</h4>
                  </div>
               </div>
            </div>
   
        
     <div class="container m-auto p-auto"> <h3 ><?php echo $row['name']; ?></h3>
      <p class="md-5 pd-5"><?php echo $email; ?></p> </div>
    </div>
    <div class="container m-auto p-auto" style="width:100%">
<div class=" row">    
    <div class="d-flex  justify-content-center col-md-6">
        <div class="info">
            <h4>ASIST INFO</h4>
            <div class="info_data">
                 <div class="data">
                    <h5><?php echo $row2['name']; ?></h5>
                    
                 </div>
                 <div class="data">
                
                    <p><?php echo $row2['phone']; ?></p>
              </div>
            </div>
        </div>
</div>      
      <div class=" d-flex justify-content-center col-md-6 ">
          


          <div class="info">
            <h4>PARKING INFO</h4>
            <div class="info_data">
                 <div class="data">
                    <h5><?php echo $park; ?></h5>
                    
                 </div>
                 <div class="data">
                
                    <p>Fee - 
                        <?php
                      if (strpos($row1['parkingspace'], 'T') !== false)
                        if($row7['a']<12)
                            echo'$5';
                        elseif($row7['a']<24)
                              echo '$8';
                             elseif($row7['a']<168)
                                echo '$40';
                                 else
                                    echo'$100';

                     if (strpos($row1['parkingspace'], 'L') !== false)
                        if($row7['a']<12)
                            echo'$10';
                        elseif($row7['a']<24)
                              echo '$15';
                             elseif($row7['a']<168)
                                echo '$60';
                                 else
                                    echo'$150';
                    if (strpos($row1['parkingspace'], 'H') !== false)
                        if($row7['a']<12)
                            echo'$20';
                        elseif($row7['a']<24)
                              echo '$30';
                             elseif($row7['a']<168)
                                echo '$100';
                                 else
                                    echo'$250';
                        
                        ?></p>
              </div> 
            </div>
        </div></div></div>


</div><div class="container m-auto p-5">
 
<form action="" method="post">
<input type="submit" name="submit" class="btn btn-dark mr-2" value="Payment Received" >
</form>
      
        
    </div>



</section>

 
           

</body>
</html>