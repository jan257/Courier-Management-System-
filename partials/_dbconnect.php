<?php

$servername="localhost";
$username="root";
$password="JahnaviP@2537";
$database="cms";

$conn =mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("failed to connect".mysqli_connect_error());
}
else{
    
}
?>