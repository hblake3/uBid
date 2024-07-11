<?php
// Connect to database
require_once 'db_connection.php';

// Query
$query = "SELECT * FROM user_profile";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Report</title>
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
    // Display report
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "Profile ID: " . $row["profileID"] . "<br>";
            echo "Username: " . $row["username"] . "<br>";
            echo "Address: " . $row["address"] . "<br>";
            echo "Password: " . $row["password"] . "<br>";
            echo "First Name: " . $row["firstName"] . "<br>";
            echo "Last Name: " . $row["lastName"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Phone Number: " . $row["phoneNumber"] . "<br>";
            echo "Credit Card: " . $row["creditCard"] . "<br>";
            echo "Admin: " . $row["isAdmin"] . "<br>";
            echo "</div><br>";
        }
    } else {
        echo "No results found.";
    }

    // Close result set and database connection
    $result->close();
    $conn->close();
    ?>
    </div>
    </main>
    <div id="footer" style="padding-top: 6vh;"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>