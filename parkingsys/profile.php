      
<?php
include('loginsession.php');
if(!isset($_SESSION['login_user'])){
header("location: basics.php"); // Redirecting To Home Page
}
      $email =$_SESSION['login_user'];
     $conn = mysqli_connect("localhost", "root", "") or die(mysqli_error());
    $db_selected =mysqli_select_db($conn, "parking")  or die(mysqli_error($conn));
    // SQL query to fetch information of registerd users and finds user match.
    $sql = "select * from customer where email='$email' ";
    $i=1;

    $ename=[];
    $time=[];
    $park=[];
    $enum=[];

    $ses_sql=mysqli_query($conn, $sql)  or die(mysqli_error($conn)); 
    $row = mysqli_fetch_assoc($ses_sql);

    $sql1 = "select * from parkings where customer='$email' ";

    $ses_sql1=mysqli_query($conn, $sql1)  or die(mysqli_error($conn)); 
    while($row1 = mysqli_fetch_assoc($ses_sql1))
    {
        $park[$i]=$row1['parkingspace'];
    $sql2 = "select * from employee where email='$row1[employee]' ";

    $ses_sql2=mysqli_query($conn, $sql2)  or die(mysqli_error($conn)); 
    $row2 = mysqli_fetch_assoc($ses_sql2);
    $ename[$i]=$row2['name'];
    $enum[$i]=$row2['phone'];
   
    $sql3 = "select TIMESTAMPDIFF(HOUR,parkedtime,CURRENT_TIMESTAMP()) as a from parkings where customer='$email'";

    $ses_sql3=mysqli_query($conn, $sql3)  or die(mysqli_error($conn)); 
    $row3 = mysqli_fetch_assoc($ses_sql3);
    $time[$i]=$row3['a'];
    $i=$i+1;
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
        <a class="nav-link " href="connect.php">Contact Us</a>
      </li>  

    </ul> 
  </div>
</nav>

<section class="contact pt-100 pb-100 align_center" id="contact" style="width:100%">
         <div class="container m-auto p-auto" style="width:100%">
            <div class="row">
               <div class="col-xl-6 mx-auto text-center">
                  <div class="section-title mb-100">
                  
                     <h4>Welcome</h4>
                  </div>
               </div>
            </div>
   
        
     <div class="container m-auto p-auto"> <h3 ><?php echo $row['name']; ?></h3>
      <p class="md-5 pd-5"><?php echo $login_session; ?></p> </div>
    </div>
    <div class="container m-auto p-auto" style="width:100%">
<div class=" row">    
    <div class="d-flex  justify-content-center col-md-6">
        <div class="info">
            <h4>ASIST INFO</h4>
            
  <?php
            $k=1;
            if($i==1)
            {
                echo' <div class="info_data">
                 <div class="data">
                    <h5> not yet</h5>
                    
                 </div>
                 <div class="data">
                
                    <h5>parked</h5>
              </div>
            </div>';
            }

            while($k<$i)
            {
                echo' <div class="info_data">
                 <div class="data">
                    <h5>'; echo $ename[$k]; echo'</h5>
                    
                 </div>
                 <div class="data">
                
                    <p>';echo $enum[$k]; echo'</p>
              </div>
            </div>';
            $k=$k+1;
          }
    ?>

        </div>
</div>      
      <div class=" d-flex justify-content-center col-md-6 ">
          


          <div class="info">
            <h4>PARKING INFO</h4>

   <?php
            $k=1;

             if($i==1)
            {
                echo' <div class="info_data">
                 <div class="data">
                    <h5> -</h5>
                    
                 </div>
                 <div class="data">
                
                    <h5>fee - $0</h5>
              </div>
            </div>';
            }
            while($k<$i)
            { echo'

            <div class="info_data">
                 <div class="data">
                    <h5>'; echo $park[$k]; echo'</h5>
                    
                 </div>
                 <div class="data">
                
                    <p>Fee - 
                    ';
                      if (strpos($park[$k], 'T') !== false)
                        if($time[$k]<12)
                            echo'$5';
                        elseif($time[$k]<24)
                              echo '$8';
                             elseif($time[$k]<168)
                                echo '$40';
                                 else
                                    echo'$100';

                     if (strpos($park[$k], 'L') !== false)
                        if($time[$k]<12)
                            echo'$10';
                        elseif($time[$k]<24)
                              echo '$15';
                             elseif($time[$k]<168)
                                echo '$60';
                                 else
                                    echo'$150';
                    if (strpos($park[$k], 'H') !== false)
                        if($time[$k]<12)
                            echo'$20';
                        elseif($time[$k]<24)
                              echo '$30';
                             elseif($time[$k]<168)
                                echo '$100';
                                 else
                                    echo'$250';
                        
                        echo'</p>
              </div> 
            </div>';
            $k=$k+1;
        } ?>
        </div></div></div>


</div><div class="container m-auto p-5">

       
        <a href="logout.php" class="btn btn-dark btn-sm align_center">Logout</a>
      
        
    </div>



</section>

 
           

</body>
</html>