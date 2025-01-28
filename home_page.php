<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            /* background-image: url('/login/assets/backgroud.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;*/
            background-size: 100% 100%;
            background-color: #FDBF60; /* Subtle color */
        }

        .button-container {
            text-align: center;
            margin-top: 50px;
        }

        .button-container .btn {
            width: 200px; /* Set button width */
            margin-bottom: 10px;
        }

        .navbar-nav {
            margin: 0 auto;
            font-size: large;

            .nav-item{
                text-align:center;
            }
        }

        .navbar-nav .nav-link {
            color: #333;
            margin-right: 15px;
        }

        .navbar-nav .nav-link.active {
            font-weight: bold;
        }

        .services-form {
            background-color: rgba(255, 255, 255, 0.7); /* White */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            border-bottom: 2px solid white;     

        }
        .services-form .btn-primary {
            background-color: #FBA834; /* Blue */
            border-color: #FBA834; /* Blue */
            color: black;
        }

        .services-form .btn-secondary {
            background-color: #6c757d; /* Gray */
            border-color: #6c757d; /* Gray */
        }

        .services-form .btn-warning {
            background-color: #ffc107; /* Yellow */
            border-color: #ffc107; /* Yellow */
        }

        .services-form .btn-dark {
            background-color: #343a40; /* Dark Gray */
            border-color: #343a40; /* Dark Gray */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">RAPID DELIVERY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>
                
                <!-- <li class="nav-item">
                    <a class="nav-link" href="/login/staff.php">Staff Registration</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="/login/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- alert message -->
<div class="container my-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading" style="text-align:center">Hello! Welcome to Rapid Delivery </h4>
        <hr>
        <p>You are Logged in as <?php echo $_SESSION['mail']?>.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <p class="mb-0">Whenever you need to, be sure to logout <a href="/login/logout.php">using this link</a>.</p>
    </div>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="services-form">
            <h1 class="text-center mb-4 pb-3" style="border-bottom: 2px solid white; color:black; text-align:center;font-family:system-ui; font-weight: 510;">Services</h1>

    <div class="button-container">
        <a class="nav-link" href="/login/place_courier.php">
            <button class="btn btn-primary" type="button"><b>PLACE COURIER</b></button>
        </a>
        <a class="nav-link" href="/login/delivery_status.php">
            <button class="btn btn-secondary" type="button"><b>TRACK ORDER</b></button>
        </a>
        <a class="nav-link" href="/login/feedback.php">
            <button class="btn btn-warning" type="button"><b>FEEDBACK</b></button>
        </a>
        <a class="nav-link" href="/login/del_feedback.php">
            <button class="btn btn-dark" type="button"><b>DELETE FEEDBACK</b></button>
        </a> 
        <!-- <a class="nav-link" href="/login/franchise.php">
            <button class="btn btn-danger" type="button">ADD FRANCHISE</button>
        </a>
        <a class="nav-link" href="/login/del_franchise.php">
            <button class="btn btn-light" type="button">DELETE FRANCHISE</button>
        </a> -->
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="container" id="about" style="margin-top: 20px; width: 85%;">
             <div class="row">
                <div class="col-md-6 p-5" style="background-color: rgba(255, 255, 255, 0.7); color: black; border-radius: 15px; ">
                    <h2 class="display-5 text-center mb-3 pb-2" style="border-bottom: 2px solid white;"><strong>About Us</strong></h2>
                    <p class="pb-3" style="border-bottom: 2px solid white;">At Rapid Delivery, we are dedicated to providing exceptional courier service solutions tailored to meet the unique needs of our clients. With years of industry experience and a passion for innovation, we strive to deliver outstanding results that exceed expectations.</p>
                    <p class="pb-3" style="border-bottom: 2px solid white;">Our team consists of highly skilled professionals who are committed to delivering excellence in every aspect of our work. We believe in building strong relationships with our clients based on trust, integrity, and mutual respect</p>
                    <p class="pb-3" style="border-bottom: 2px solid white;">At Rapid Delivery, customer satisfaction is our top priority. We listen to our clients' needs attentively and work closely with them to develop customized solutions that drive success and growth.</p>
                </div>
                <div class="col-md-6">
                    <img src="/login/assets/backgroud.jpg" style="height: 500px; width: 100%; padding-top: 5%;" >
                </div>
             </div>
         </div>
         
         <div class="container" id="contact" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12 p-5" style="background-color: rgba(255, 255, 255, 0.7); color: black; border-radius: 15px;">
            <h2 class="display-5 text-center mb-3 pb-2" style="border-bottom: 2px solid white;"><strong>Contact Us</strong></h2>
            <p class="pb-3" style="border-bottom: 2px solid white;">For any inquiries or assistance, please feel free to contact us using the following details:</p>
            <p class="pb-3"><strong>Email:</strong> RapidDelivery@gmail.com</p>
            <p class="pb-3"><strong>Phone:</strong> +91 80506 37879</p>
            <p><strong>Address:</strong> #33 Bell street, Banaglore-560010, Karnataka, India</p>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html> 