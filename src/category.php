<?php
// Connect to the database
require_once 'db_connection.php';

// Check if categoryID is provided in the URL
if (!isset($_GET["categoryID"])) {
    header("Location: index.php");
    exit;
}

// Retrieve categoryID from URL
$categoryID = $_GET["categoryID"];

// Fetch items from the database based on categoryID
$sql = "SELECT * FROM auction_item WHERE categoryID = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $categoryID);
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        // Check if there are items found
        if ($result->num_rows > 0) {
            ?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>View Items</title>
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
                <main class="container mt-5">
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Items in Category</title>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
                    </head>

                    <body>
                        <div class="container mt-5">
                            <h1>Items in Category</h1>
                            <ul class="list-group">
                                <!-- Display items -->
                                <label for="category" class="form-label">Category</label>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>Title:</strong> <?php echo $row['title']; ?><br>
                                            <strong>Description:</strong> <?php echo $row['description']; ?>
                                        </div>
                                        <a href="itemDetails.php?itemID=<?php echo $row['itemID']; ?>" class="btn btn-primary">View
                                            Details</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </body>

                    </html>
                    <?php
        } else {
            // If no items found
            echo "No items found in this category.";
        }
    } else {
        echo "Error executing query: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Close database connection
$conn->close();
?>

        </form>
        </div>
        </div>
    </main>
    <div id="footer" style="padding-top: 6vh;"></div>
</body>

</html>