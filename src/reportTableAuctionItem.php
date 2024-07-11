<?php
// Connect to database
require_once 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Item Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&family=Poppins:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $("#header").load("header.php");
            $("#footer").load("footer.html");
        });
    </script>
    <style>
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            height: 250px;
        }

        .image-container img {
            width: auto;
            height: 100%;
        }

        .custom-container {
            padding: 2vh;
        }

        .custom-caption {
            padding-top: 3vh;
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="header"></div>
    <main class="container mt-5"></main>
    <?php
    // Query
    $query = "SELECT * FROM auction_item";
    $result = $conn->query($query);

    // Display report
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Item ID: " . $row["itemID"] . "<br>";
            echo "Title: " . $row["title"] . "<br>";
            echo "Description: " . $row["description"] . "<br>";
            echo "Start Time: " . $row["startTime"] . "<br>";
            echo "End Time: " . $row["endTime"] . "<br>";
            echo "Starting Price: " . $row["startingPrice"] . "<br>";
            echo "Highest Bid: " . $row["highestBid"] . "<br>";
            echo "Seller Profile: " . $row["sellerProfile"] . "<br>";
            echo "Buyer Profile: " . $row["buyerProfile"] . "<br>";
            echo "Category ID: " . $row["categoryID"] . "<br><br>";
        }
    } else {
        echo "No results found.";
    }

    $conn->close();
    ?>
    </div>
    </main>
    <div id="footer" style="padding-top: 6vh;"></div>
</body>

</html>