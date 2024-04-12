<?php
$showerror = false;
$showalert = false;

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:login.php");
    exit;
}

?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/_dbconnect.php';

    $courier_id = $_POST['CTID']; // Changed from 'courier_id' to 'CTID'
    //$status = $_POST['status'];
    //$status = 'In transit'; // Assuming status is hardcoded for now

    $trackingSql = "SELECT * FROM tracking WHERE courier_id='$courier_id'  ORDER BY timestamp DESC;";
    $trackingResult = mysqli_query($conn, $trackingSql);

    if ($trackingResult) {
        // If tracking details are found, set $showalert to true
        $showalert = true;
        // Check if any rows are fetched
        if(mysqli_num_rows($trackingResult) == 0) {
            // If no rows are fetched, set $showerror to true
            $showerror = true;
        }
    }
    else {
        // Error executing the query
        $showerror = true;
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delivery Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<?php require 'partials/_nav.php' ?>
<style>
    body {
        background-image: url('/login/assets/red-delivery car.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        background-position: left;
    }

    /* Adjust the alert message to be visible */
    .alert {
        position: relative;
        z-index: 9999;
    }
    
    .tracking-info {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #f9f9f9;
    }

    .tracking-info p {
        margin: 0;
    }

    .tracking-info p span {
        font-weight: bold;
    }
    .track-form{
        background-color: rgba(255, 255, 255, 0.7); /* White */
        border-radius: 10px;
        padding: 30px;
         box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.8);
        margin-top: 150px;
        width:120%;
        font-family:system-ui;
    }

</style>

<br>

<?php
if ($showalert) {
    if (!$showerror) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Tracking Details !</h4>';

        while ($row = mysqli_fetch_assoc($trackingResult)) {
            echo "<div class='tracking-info'>";
            echo "<p><span>Courier ID       :</span> " . $row['courier_id'] . "</p>";
            echo "<p><span>Delivery Location:</span> " . $row['location'] . "</p>";
            echo "<p><span>Status           :</span> " . $row['status'] . "</p>";
            echo "<p><span>Timestamp        :</span> " . $row['timestamp'] . "</p>";
            echo "<br>";
            if($row['status']  == 'In transit')
            {
                echo "<h5><span>Your package is currently in transit. Please keep an eye out for your delivery.</span></h5>";
            }
            else{
                echo "<h5><span>Your package has been successfully delivered. Thank you for choosing our services!</span></h5>";
            }
            echo "</div>";
        }

        echo '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> No tracking information available for the provided courier ID.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
?>
<div class="container">
<div class="col-md-5 offset-md-0">
    <div class="track-form">
    <h1 style="color:black; text-align:center;font-family:system-ui; font-weight: 500; font-variant: small-caps">Track your Delivery</h1>
    <h4 style="color:black; text-align:center">Every 24 Hours⌛ we deliver for you !</h4>
    <br>
    <form action="/login/delivery_status.php" method="post">
        <div class="mb-3">
            <label for="CTID" class="form-label"> <h5 style="color:black">Courier ID</h5></label>
            <input type="text" class="form-control" id="CTID" name="CTID">
        </div>
        <br>
        <button type="submit" class="btn btn-danger col-md-12">Submit</button>
    </form>
</div>
</div>
</div>

<br><br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
