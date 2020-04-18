<?php
  session_start();
  if(!isset($_SESSION['login_admin']))
   header("location: basics.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 

  <link rel="icon" href="images/download.png" type="image/icon type">
  <title>Availability-Obsidian Parking</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link rel="stylesheet" type="text/css" href="layoutcss.css">
</head>
<body class="" style="margin: 100px;">
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
        <a class="nav-link" href="connect.php">Contact Us</a>
      </li>  
    </ul> 
  </div>
</nav>
<section>


   <div class="row m-5 p-4">
               <div class="col-xl-6 mx-auto text-center">
                  <div class="section-title ">
                  
                     <h4>Availability</h4>
                  </div>
               </div>
            </div>
            <div class="container">

    <h5>Booked  &nbsp; &nbsp;&nbsp; <button style="width:16px; height: 16px;background-color:white; border:0px solid black;"></button> </h5>
    <h5> Available &nbsp; &nbsp;<button style="width:16px; height: 16px; background-color: #21252945; border:0px solid black;"></button> </h5></h5>
</div>


  <div class="container1 container my-5 py-5 row">

    <div class="cars-whole whole m-3" style="min-width: 12rem; min-height: 25rem;">
        <div class="col left">
            <?php
            $conn = mysqli_connect("localhost", "root", "") or die(mysqli_error());
            $db_selected =mysqli_select_db($conn, "parking")  or die(mysqli_error($conn));
            $query = "select * from parking_space";
            $ses_sql = mysqli_query($conn, $query);
          //  echo 'hello'.$ses_sql;
            $i=1;
            $spacename=[];
            $status=[];
            while($row = mysqli_fetch_assoc($ses_sql)){

                $spacename[$i] = $row['spacename'];
                $status[$i] =$row['status'];
                $i=$i+1;

            }

            for($i=1;$i<11;$i=$i+1):
                if($status[$i]==0):
            ?>  
            <div class="vehicle align_center"><?=$spacename[$i]; ?></div>
            <?php else:?> 
            <div class="vehicle align_center booked"><?=$spacename[$i]; ?></div>;
        <?php endif; endfor; ?>
        </div>

<?php echo 
      '<div class="col right">';
      for($i=11;$i<21;$i=$i+1)
        if($status[$i]==0){
           echo'<div class="vehicle align_center">'; echo $spacename[$i]; echo'</div>';
        }
        else {
           echo'<div class="vehicle align_center booked">'; echo $spacename[$i]; echo'</div>';
        }


    echo'  </div>
    </div>
    <div class="bikes-whole whole m-3" style="min-width: 8rem; min-height: 25rem;">
      <div class="col left">';
      for($i=21;$i<41;$i=$i+1)
        if($status[$i]==0){
           echo'<div class="vehicle align_center">'; echo $spacename[$i]; echo'</div>';
        }
        else{
           echo'<div class="vehicle align_center booked">'; echo $spacename[$i]; echo'</div>';
        }
       echo'
      </div>
      <div class="col right">';
            for($i=41;$i<61;$i=$i+1)
            if($status[$i]==0){
               echo'<div class="vehicle align_center">'; echo $spacename[$i]; echo'</div>';
            }
            else{
               echo'<div class="vehicle align_center booked">'; echo $spacename[$i]; echo'</div>';
            }


echo'        
      </div>
      
    </div>

    <div class="trucks-whole whole m-3" style="min-width: 16rem; min-height:25rem;">
      <div class="col left">';
        for($i=61;$i<66;$i=$i+1)
        if($status[$i]==0){
           echo'<div class="vehicle align_center">'; echo $spacename[$i]; echo'</div>';
        }
        else{
           echo'<div class="vehicle align_center booked">'; echo $spacename[$i]; echo'</div>';
        }
       
      echo' </div>
      <div class="col right">';

        for($i=66;$i<71;$i=$i+1)
        if($status[$i]==0){
           echo'<div class="vehicle align_center">'; echo $spacename[$i]; echo'</div>';
        }
        else{
           echo'<div class="vehicle align_center booked">'; echo $spacename[$i]; echo'</div>';
        }
   echo'
      </div>
      
    </div>



  </div>

</section>
<form action="" method="post">

<div class="row m-3 p-3">
               <div class="col-xl-6 mx-auto text-center">
                  <div class="section-title ">
                  
                     <h3>SEARCH</h3>
                  </div>
               </div>
            </div>
<section>

  <div class="container m-auto p-auto">
   <div class="row m-auto p-auto"> <div class="formgroup col-sm-6 col-xl-4">
    <label style="margin:0;">Parking id</label>
    <input type="text" name="parkingid" class="form-control" aria-describedby="emailHelp" placeholder="Parking id">
  </div>
  <div class="formgroup col-sm-6 col-xl-4">
    <label style="margin:0;"> Vechicle id</label>
    <input type="text"  name="vehicleid" class="form-control"  placeholder="Vechicle id">
  </div>
  <div class="formgroup col-sm-6 col-xl-4">
    <label style="margin:0;">Email address</label>
    <input type="email" name="email" class="form-control"  placeholder="Email address">
  </div>
   <div class="formgroup col-sm-6 col-xl-4">
    <label style="margin:0;">Type</label>
    <select id="yoyo" class="form-control" name="type"aria-describedby="emailHelp" placeholder="Type" >
      <option value="">all vehicle</option>
       <option value="T">two wheeler</option>
       <option value="L">light motor vehicle</option>
       <option value="H">heavy motor vehicle</option>
       </select>
  </div>
   <div class="formgroup col-sm-6 col-xl-4">
    <label style="margin:0;">Date</label>
    <input type="date" name="date" class="form-control"  placeholder="Date">
  </div>
 

  <div class="formgroup col-sm-6 col-xl-4">
    <label style="margin:0;">Mobile number</label>
    <input type="text" name="phone"class="form-control" aria-describedby="emailHelp" placeholder="Mobile number">
  </div>
 
  
   

</div>
</div>
</section>
<section class="mb-5">
<div class=" container m-auto p-auto button_width mb-5"> <label style="margin:0; "></label> <button style="margin-top:2px;" type="submit " name="signup-form" class=" m-auto p-auto align_center btn btn-sm btn-dark mr-2 col-md-12  mb-5">Submit</button>
  </div>

  </div>
</form>
  </section>
  ';
  if (isset($_POST['signup-form']))
{ echo'  <div class="container">
  <div class="col-xl-6 mx-auto text-center ">
                  <div class="section-title m-5  ">
                  
                     <h3>CURRENTLY PARKED</h3>
                  </div>
               </div>
            </div>
 <div class=" m-auto p-auto">
   <div class="row m-auto p-auto"> <div class="formgroup col-sm-2 ">
    <label style="margin:0;">Parking id</label>
    
  </div>
  <div class="formgroup col-sm-2">
    <label style="margin:0;"> Vechicle id</label>
   
  </div>
  <div class="formgroup col-sm-2">
    <label style="margin:0;">customer name</label>
   
  </div>
   <div class="formgroup col-sm-2">
    <label style="margin:0;">Type</label>
   
  </div>
   <div class="formgroup col-sm-2">
    <label style="margin:0;">Date</label>
    
  </div>
 

  <div class="formgroup col-sm-2">
    <label style="margin:0;">Mobile number</label>
   
  </div>
  </div>
  </div>
 ';
 $parkingid=$vehicleid=$email=$type=$date=$phone="";
 $parkingid=$_POST['parkingid'];
 $vehicleid=$_POST['vehicleid'];

 $email=$_POST['email'];
 $type=$_POST['type'];
 $date=$_POST['date'];
 $phone=$_POST['phone'];

    $sql1="select * from parkings as p, customer as c where p.customer=c.email and c.email like '%$email%' and p.customer like '%$email%' and p.vehicleid like '%$vehicleid%' and p.parkingspace like '%$parkingid%' and p.parkingspace like '%$type%' and date(p.parkedtime) like '%$date%' and c.phone like '%$phone%' order by p.parkedtime desc"  ;
    // die($sql1);
    $ses_sql1=mysqli_query($conn, $sql1)  or die(mysqli_error($conn)); 
    

    while($row1=mysqli_fetch_assoc($ses_sql1)) 
{
//var_dump($row1);
echo' <div class=" m-auto p-auto">
   <div class="row m-auto p-auto"> <div class="formgroup col-sm-2 ">
    <label style="margin:0;">';echo $row1['parkingspace']; echo'</label>
    
  </div>
  <div class="formgroup col-sm-2">
    <label style="margin:0;">'; echo $row1['vehicleid'];echo' </label>
   
  </div>
  <div class="formgroup col-sm-2">
    <label style="margin:0;">';echo $row1['name'];echo'</label>
   
  </div>
   <div class="formgroup col-sm-2">
    <label style="margin:0;">';if (strpos($row1['parkingspace'], 'T') !== false) 
                                  echo'two wheeler';
                                  elseif (strpos($row1['parkingspace'], 'L') !== false)
                                    echo 'light motor vehicle';
                                  else
                                    echo 'heavy motor vehicle'; 

    echo'</label>
   
  </div>
   <div class="formgroup col-sm-2">
    <label style="margin:0;">';echo $row1['parkedtime'];echo'</label>
    
  </div>
 

  <div class="formgroup col-sm-2">
    <label style="margin:0;">';echo $row1['phone'];echo'</label>
   
  </div>
  </div>';
}

echo'
   <div class="col-xl-6 mx-auto text-center">
                  <div class="section-title m-5  ">
                  
                     <h3>PREVIOUSLY PARKED</h3>
                  </div>
               </div>
            </div>
 <div class=" m-auto p-auto">
   <div class="row m-auto p-auto"> <div class="formgroup col-sm-2 ">
    <label style="margin:0;">Parking id</label>
    
  </div>
  <div class="formgroup col-sm-2">
    <label style="margin:0;"> Vechicle id</label>
   
  </div>
  <div class="formgroup col-sm-2">
    <label style="margin:0;">customer name</label>
   
  </div>
   <div class="formgroup col-sm-2">
    <label style="margin:0;">Type</label>
   
  </div>
   <div class="formgroup col-sm-2">
    <label style="margin:0;">Date</label>
    
  </div>
 

  <div class="formgroup col-sm-2">
    <label style="margin:0;">Mobile number</label>
   
  </div>
  </div>
  
            </div>';


                $sql2="select * from parkingshis as p, customer as c where c.email=p.customer  and p.customer like '%$email%' and p.vehicleid like '%$vehicleid%' and p.parkingspace like '%$parkingid%' and p.parkingspace like '%$type%' and date(p.parkedtime) like '%$date%' and c.phone like '%$phone%' order by p.parkedtime desc"  ;
    $ses_sql2=mysqli_query($conn, $sql2)  or die(mysqli_error($conn)); 
    

    while($row1 = mysqli_fetch_assoc($ses_sql2)) 
{
//var_dump($row1);
echo'<section> 
    <div class=" m-auto p-auto">
   <div class="row m-auto p-auto"> <div class="formgroup col-sm-2 ">
    <label style="margin:0;">';echo $row1['parkingspace']; echo'</label>
    
  </div>
  <div class="formgroup col-sm-2">
    <label style="margin:0;">'; echo $row1['vehicleid'];echo' </label>
   
  </div>
  <div class="formgroup col-sm-2">
    <label style="margin:0;">';echo $row1['name'];echo'</label>
   
  </div>
   <div class="formgroup col-sm-2">
    <label style="margin:0;">';if (strpos($row1['parkingspace'], 'T') !== false) 
                                  echo'two wheeler';
                                  elseif (strpos($row1['parkingspace'], 'L') !== false)
                                    echo 'light motor vehicle';
                                  else
                                    echo 'heavy motor vehicle'; 

    echo'</label>
   
  </div>
   <div class="formgroup col-sm-2">
    <label style="margin:0;">';echo $row1['parkedtime'];echo'</label>
    
  </div>
 

  <div class="formgroup col-sm-2">
    <label style="margin:0;">';echo $row1['phone'];echo'</label>
   
  </div>
  </div> </section>';
}

echo'
 


</section>';
}
echo'
<script>
  document.querySelectorAll(".vehicle").forEach( function(v) {
    if(v.classList.contains("booked")){

    v.addEventListener("click", function(e) {
      window.location.href = `reciept.php?id=${e.target.innerHTML}`;
      });

    }
    else{

    v.addEventListener("click", function(e) {
      window.location.href = `employeelog.php?id=${e.target.innerHTML}`;
      });

    }

  });

</script>
</body>
</html>';
?>


