<?php
ob_start();
session_start();

$timezone = date_default_timezone_set("America/Monterrey");

$con = mysqli_connect("localhost", "root", "square", "slotify");

if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}

?>