
<?php
$mysqli = new mysqli("localhost", "root", "", "parking"); // Adjust DB credentials
$slots = ['A1', 'B1', 'C1', 'D1', 'E1'];
$capacity = 130;
$result = [];

foreach ($slots as $slot) {
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM bookings WHERE slot = ?");
    $stmt->bind_param("s", $slot);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $result[$slot] = $capacity - $count;
    $stmt->close();
}
header('Content-Type: application/json');
echo json_encode($result);
?>