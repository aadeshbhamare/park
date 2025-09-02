<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($check);

    if ($result->num_rows == 0) {
        die("Invalid login. <a href='index.html'>Try again</a>");
    }
}

echo "<h2>Welcome to Smart Parking</h2>";

$sql = "SELECT * FROM parking_slots";
$result = $conn->query($sql);

echo "<table border='1'>
<tr>
<th>Location</th>
<th>Street</th>
<th>Slots</th>
<th>Hours</th>
<th>Cost</th>
<th>Time</th>
<th>Status</th>
<th>Action</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>{$row['location']}</td>
    <td>{$row['street']}</td>
    <td>{$row['slots']}</td>
    <td>{$row['hours']}</td>
    <td>{$row['cost']}</td>
    <td>{$row['booking_time']}</td>
    <td>{$row['status']}</td>
    <td>";

    if ($row['status'] == 'Available') {
        echo "<a href='book.php?id={$row['id']}'>Book</a>";
    } else {
        echo "N/A";
    }

    echo "</td></tr>";
}

echo "</table>";
?>
