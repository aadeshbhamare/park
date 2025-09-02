<?php 
// Connect to DB
$conn = new mysqli("localhost", "root", "", "parking");

// Insert 100 slots for each area
$areas = ['A1', 'B1', 'C1', 'D1', 'E1'];

foreach ($areas as $area) {
    // Get area_id
    $result = $conn->query("SELECT id FROM parking_areas WHERE area_code='$area'");
    $row = $result->fetch_assoc();
    $area_id = $row['id'];

    // Insert 100 slots
    for ($i = 1; $i <= 100; $i++) {
        $conn->query("INSERT INTO slots (area_id, slot_number) VALUES ($area_id, $i)");
    }
}
echo "✅ 100 slots inserted for each area.";
?>
