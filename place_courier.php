<?php
$showerror=false;
$showalert=false;

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    header("location:login.php");
    exit;
}

?>


<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'partials/_dbconnect.php';


  $name=$_POST['name'];
  $email=$_POST['mail'];
  $phone=$_POST['phone'];
  $sadd=$_POST['sadd'];
  $radd=$_POST['radd'];
  $date=$_POST['date'];
  $courier_id = uniqid("CTID");

  $sql=" insert into place_courier values('$name','$email',$phone,'$sadd','$radd', curdate());";
  $result = mysqli_query($conn,$sql);
  if($result)
  {
    $showalert=true;
    $location = $radd; // Get location from form or another source
    $status = "In transit"; // Set initial status
    $insertSql = "INSERT INTO tracking (courier_id, location, status) VALUES ('$courier_id', '$location', '$status')";
    $insertResult = mysqli_query($conn, $insertSql);
    if (!$insertResult) 
    {
      $showerror = true;
    }
  else
  {
  $showerror=true;
  }
  
}
}

?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Place courier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  
  <?php require 'partials/_nav.php' ?>
  <?php 
if($showalert)
{
    $CTIDsql = "select * from tracking where courier_id='$courier_id' AND status='$status';";
    $CTIDresult = mysqli_query($conn, $CTIDsql);
    if($CTIDresult)
    {
        while ($CID = mysqli_fetch_assoc($CTIDresult)) {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert-success">
                <strong>Success</strong> Your courier order has been placed successfully. Your Courier ID is: ' . $CID['courier_id'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
}

if($showerror && !$showalert)
{
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert-success">
        <strong>Sorry</strong> unable to place your order:(
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>


  <style>
body {
  background-image: url('/login/assets/ecom.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
.place_courier-form {
            background-color: rgba(255, 255, 255, 0.7); /* White */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 15px;
            width:120%;
            font-family:system-ui;
            
        }
</style>


<br>
<div class="container">
<div class="col-md-5 offset-md-7">
<div class="place_courier-form">
<h1 style="color:black; text-align:center;font-family:system-ui; font-weight: 510; font-variant: small-caps ">Place Courier Order</h1>
      <form action="/login/place_courier.php"method="post">
<br>    
<div class="mb-3">
<div class="mb-3">
  <label for="name" class="form-label"> <h5 style="color:black">Name</h5></label>
  <input type="text" class="form-control" id="name" name="name">
</div>
  <label for="mail" class="form-label"><h5 style="color:black">Email address</h5></label>
  <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp">
  
</div>
<div class="mb-3">
  <label for="phone" class="form-label"><h5 style="color:black">Phone number</h5></label>
  <input type="text" class="form-control" id="phone" name="phone">
</div>
<div class="mb-3">
  <label for="sadd" class="form-label"><h5 style="color:black">Sender's Address</h5></label>
  <input type="text" class="form-control" id="sadd" name="sadd">
  
</div>
<div class="mb-3">
  <label for="radd" class="form-label"><h5 style="color:black">Receiver's Address</h5></label>
  <input type="text" class="form-control" id="radd" name="radd">
 
</div>
<div class="mb-3">
  <label for="date" class="form-label"><h5 style="color:black">Enter Today's Date</h5></label>
  <input type="date" class="form-control" id="date" name="date">
 
</div>
<br>
<button type="submit" class="btn btn-danger col-md-12 ">Submit</button>
</form>

</div> 
</div> 
</div> 


<br><br>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>