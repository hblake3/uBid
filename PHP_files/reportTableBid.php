<?php
require_once 'db_connection.php';

$query = "SELECT * FROM bid";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Bid ID: " . $row["bidID"] . "<br>";
        echo "Amount: " . $row["amount"] . "<br>";
        echo "Bid Time: " . $row["bidTime"] . "<br>";
        echo "Profile ID: " . $row["profileID"] . "<br>";
        echo "Item ID: " . $row["itemID"] . "<br><br>";
    }
} else {
    echo "No results found.";
}

$conn->close();
?>