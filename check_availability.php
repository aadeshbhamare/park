<?php
include 'db.php'; // connect to DB
$area = $_GET['area'];
$date = $_GET['date'];

$query = "SELECT COUNT(*) as booked FROM bookings WHERE area='$area' AND date='$date'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$max_slots = 100;
$available = $max_slots - $row['booked'];

echo json_encode(["available" => $available]);
?>
