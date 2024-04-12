<?php
$showerror=false;
$showalert=false;

if($_SERVER['REQUEST_METHOD']=='POST'){
include 'partials/_dbconnect.php';

    $username=$_POST['uname'];
    $email=$_POST['mail'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];

    // $exists=false;
    
    //check whether this user exists
    $existSql ="select * from users where email='$email';";
    $result = mysqli_query($conn,$existSql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows >0)
    {
       // $exists=true;
       $showerror=" email already exists";
    }
    else
    {
        //$exists=false;
    if(($pass==$cpass))
                {
                    $sql="INSERT INTO `users` (`username`, `email`, `password`, `date`) VALUES ( '$username', '$email', '$pass', current_timestamp());";
                    $result = mysqli_query($conn,$sql);
                if($result)
                {
                    $showalert=true;
                }
            }
                else{
                    $showerror="password dosen't match";
                }
                    }
        
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  
  
  <?php require 'partials/_nav.php' ?>
  <style>
body {
  background-image: url('/login/assets/789.gif');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
<?php 
if ($showalert) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert-success">
        <strong>Success</strong> Your account is now created.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <br>
    <div >
        <p>Click <a href="login.php">here</a> to log in.</p>
    </div>
    </div>';
}
if ($showerror) {
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert-success">
        <strong>ERROR</strong> ' . $showerror . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>

<style>
        body {
            background-color: #f8f9fa; /* Light Gray */
        }

        .signup-form {
            background-color: rgba(255, 255, 255, 0.8); /* White */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            font-family:system-ui;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff; /* Blue */
            border-color: #007bff; /* Blue */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Dark Blue */
            border-color: #0056b3; /* Dark Blue */
        }

        .login-option {
    margin-top: 10px;
}

.login-link {
    color: #007bff; /* Blue color */
    text-decoration: underline;
    font-weight: bold;
}
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="signup-form">
                <h2 class="text-center mb-4" style="color:black; text-align:center;font-family:system-ui; font-weight: 510; font-variant: small-caps ">Sign Up</h2>
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="uname" class="form-label">Username</label>
                        <input type="text" class="form-control" id="uname" name="uname" required>
                    </div>
                    <div class="mb-3">
                        <label for="mail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="mail" name="mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpass" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpass" name="cpass" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>