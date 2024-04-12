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
  $phone=$_POST['phone'];
  $sql= "delete from feedback where name ='$name' and  phone= '$phone';";
  $result = mysqli_query($conn,$sql);
  if($result)
  {
    $showalert=true;
  }
  else{
    $showerror=true;
  }

  
}

?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>delete feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  
  <?php require 'partials/_nav.php' ?>
  <style>
body {
  background-image: url('/login/assets/ecom.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  
}
.del_feedback-form{
  background-color: rgba(255, 255, 255, 0.7); /* White */
  border-radius: 10px;
  padding: 30px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  margin-top: 150px;
  width:120%;
  font-family:system-ui;

}
</style>

  
<br>  
    <?php 
  if($showalert)
  {echo'
  <div class="alert alert-success alert-dismissible fade show" role="alert-success">
  <strong>Success</strong> Your feedback has been deleted successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  if($showerror)
  {echo'
  <div class="alert alert-danger alert-dismissible fade show" role="alert-success">
  <strong>Sorry</strong> Unable to delete your feedback.Please try again later.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  
?>

<div class="container">   
<div class="col-md-5 offset-md-7">
<div class="del_feedback-form">     
<h1 style="color:black; text-align:center;font-family:system-ui; font-weight: 510; font-variant: small-caps">Delete your feedback</h1>
      <form action="/login/del_feedback.php"method="post">
    <br><br>
<div class="mb-3">
<div class="mb-3">
  <label for="name" class="form-label"> <h5 style="color:black">Name</h5></label>
  <input type="text" class="form-control" id="name" name="name">
</div>

<div class="mb-3">
  <label for="phone" class="form-label"><h5 style="color:black">Phone number</h5></label>
  <input type="text" class="form-control" id="phone" name="phone">
</div>
<br>
<button type="submit" class="btn btn-info col-md-12 ">Submit</button>
</form>

</div> 
</div>
</div>


<br><br>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>