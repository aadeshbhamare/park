
<?php
$mysqli = new mysqli("localhost", "root", "", "parking"); // Adjust DB credentials
$capacity = 130;

$data = json_decode(file_get_contents('php://input'), true);
$slot = $data['slot'];

$stmt = $mysqli->prepare("SELECT COUNT(*) FROM bookings WHERE slot = ?");
$stmt->bind_param("s", $slot);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count >= $capacity) {
    http_response_code(409);
    echo json_encode(['error' => 'Slot full']);
    exit;
}

// Insert booking
$stmt = $mysqli->prepare("INSERT INTO bookings (fullname, mobile, vehicle, email, datetime, slot, vehicleType, paymentMethod) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param(
    "ssssssss",
    $data['fullname'],
    $data['mobile'],
    $data['vehicle'],
    $data['email'],
    $data['datetime'],
    $data['slot'],
    $data['vehicleType'],
    $data['paymentMethod']
);
$stmt->execute();
$stmt->close();

echo json_encode(['success' => true]);
?>