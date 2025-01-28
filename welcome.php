<?php
session_start();

//if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    //header("location:login.php");
    //exit;
//}
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true) {
    header("location:home_page.php");
    exit;

}
//else{
    //header("location:welcome.php");

//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #007bff; /* Blue */
        }

        .navbar-brand {
            color: #fff; /* White */
        }

        .navbar-toggler-icon {
            background-color: #fff; /* White */
        }

        .nav-link {
            color: #fff !important; /* White */
        }

        .hero-section {
            background-image: url('path_to_your_background_image.jpg');
            background-size: cover;
            color: #fff; /* White */
            text-align: center;
            padding: 100px 0;
        }

        .about-section {
            padding: 50px 0;
            background-color: #f8f9fa; /* Light Gray */
        }

        .features-section {
            padding: 50px 0;
            background-color: #007bff; /* Blue */
            color: #fff; /* White */
        }

        .feature {
            text-align: center;
            margin-bottom: 30px;
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .feature-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .feature-description {
            font-size: 16px;
        }

        .btn-primary {
            background-color: #007bff; /* Blue */
            border-color: #007bff; /* Blue */
        }

        .btn-secondary {
            background-color: #ffc107; /* Orange */
            border-color: #ffc107; /* Orange */
        }

        /* Adjust the width of the carousel container */
        .carousel {
            max-width: 1200px; /* Set the maximum width as per your requirement */
            max-height: 700px;
            margin: auto; /* Center the carousel horizontally */    
        }

        /* Adjust the dimensions of the carousel images */
        .carousel-item img {
            max-width: 100%; /* Ensure the image fits within the carousel container */
            height: auto; /* Maintain the aspect ratio of the images */
        }

        .hero-section{
            color: #000;
            font-family: Georgia;

        }

        .about-section{
            background-color: rgb(255,255,255,0.7);
            font-family: system-ui;
            font-weight: 500;
            text-align: justify;
            word-spacing: 3px;

        }

        .features-section{
            font-family: Georgia;
            .feature{
                font-family: System-ui;
                .feature-description{
                    text-align: justify;
                    word-spacing: -5px;

                }
                

            }
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><b>RAPID DELIVERY</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="mainNav">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login/signup.php">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login/staff.php">Staff Registration</a>
                </li>
                <!-- Add more navigation items as needed -->
            </ul>
        </div>
    </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="p11.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="p4.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="p12.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>
<br><br>
<section class="hero-section">
    <div class="container">
        <h1 >Welcome to Rapid Delivery</h1>
        <p>Rapid Delivery: Where Speed Meets Reliability for Secure Parcel Solutions!</p>
        <a href="#features" class="btn btn-primary btn-lg">Learn More</a>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <h2><strong>About Us</strong></h2>
        <p>At Rapid Delivery, we are dedicated to providing exceptional courier service solutions tailored to meet the unique needs of our clients. With years of industry experience and a passion for innovation, we strive to deliver outstanding results that exceed expectations. We understand the importance of timely deliveries. Whether it's urgent documents, valuable goods, or sensitive materials, our dedicated team works tirelessly to ensure that your shipments reach their destination on time, every time. With our extensive network of distribution centers and strategic partnerships, we guarantee speedy and efficient delivery services that you can rely on.</p>
        <a href="/login/welcome.php" class="btn btn-secondary">Read More</a>
    </div>
</section>

<section id="features" class="features-section">
    <div class="container">
        <h2 style="text-align:center;">Features</h2>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="feature">
                    <i class="fas fa-user-check feature-icon"></i>
                    <h3 class="feature-title">Fast Delivery</h3>
                    <p class="feature-description">Our rapid delivery service ensures that your packages reach their destination swiftly and securely, saving you valuable time and effort.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature">
                    <i class="fas fa-chart-line feature-icon"></i>
                    <h3 class="feature-title">24/7 Customer Support</h3>
                    <p class="feature-description">Our dedicated customer support team is available round the clock to assist you with any inquiries or concerns you may have, providing personalized assistance whenever you need it.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature">
                    <i class="fas fa-clipboard-list feature-icon"></i>
                    <h3 class="feature-title">Real-time Tracking </h3>
                    <p class="feature-description">Stay informed every step of the way with our real-time tracking feature, allowing you to monitor the progress of your deliveries and ensure peace of mind throughout the process.</p>
                </div>
            </div>
            <!-- Add more features as needed -->
        </div>
    </div>
</section>

<script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Font Awesome -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
