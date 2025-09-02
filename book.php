<?php
include 'db_config.php';

$id = $_GET['id'];
$sql = "UPDATE parking_slots SET status='Booked' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Slot booked successfully.<br><a href='dashboard.php'>Back to Dashboard</a>";
} else {
    echo "Error booking slot.";
}
?>
