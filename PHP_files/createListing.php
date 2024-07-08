<?php

// Connect to database and media and ownership pages
require_once 'db_connection.php';

// Check if logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["ProfileID"])) {
    // If not logged in, redirect to login screen
    header("Location: login.php");
    exit;
} else {
    // Set profile id
    $profileId = $_SESSION['ProfileID'];
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect input for auction item
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $endTime = mysqli_real_escape_string($conn, $_POST["endTime"]);
    $startingPrice = mysqli_real_escape_string($conn, $_POST["startingPrice"]);
    $categoryID = mysqli_real_escape_string($conn, $_POST["category"]);

    $sql = "INSERT INTO auction_item (title, description, startTime, endTime, startingPrice, sellerProfile, categoryID) VALUES (?, ?, NOW(), ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssdsi", $title, $description, $endTime, $startingPrice, $profileId, $categoryID);
        if ($stmt->execute()) {
            header("Location: welcome.php");
        } else {
            $message = "Error adding auction item: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $message = "Error preparing database query.";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create New Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&family=Poppins:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="css/style.css" rel="stylesheet" />
    <style>
        .create-profile-container,
        .create-listing-container {
            max-width: 400px;
            max-height: 1500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        // Load header and footer
        $(function () {
            $("#header").load("header.php");
            $("#footer").load("footer.html");
        });
    </script>
</head>

<body>
    <div id="header"></div>
    <main>
        <div class="create-profile-container">
            <img class="d-block mx-auto mb-4 text-center" src="images/createListing.png" alt="" width="250" />
            <h2 class="display-5 fw-bold text-body-emphasis text-center">
                Create <span class="blue">New</span><span class="orange">Listing</span>
            </h2>
            <p class="mt-3 mb-3 text-center">
                Please enter information to create a listing.
            </p>
            <?php if (!empty($message)): ?>
                <p><?php echo htmlspecialchars($message); ?></p>
            <?php endif; ?>
            <!-- Form for creating a new listing -->
            <form action="createListing.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <div class="mb-3">
                        <!-- Prompt user for title -->
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"
                            required />
                    </div>
                    <div class="mb-3">
                        <!-- Prompt user for description -->
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"
                            placeholder="Enter Description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <!-- Prompt user for category -->
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="" selected disabled>Select a Category</option>
                            <optgroup label="Antiques">
                                <option value="1">Furniture</option>
                                <option value="2">Art</option>
                                <option value="3">Decorative Arts</option>
                            </optgroup>
                            <optgroup label="Automobiles">
                                <option value="4">Classic Cars</option>
                                <option value="5">Motorcycles</option>
                                <option value="6">Parts & Accessories</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="mb-3">
                        <!-- Prompt user for starting bid price -->
                        <label for="startingPrice" class="form-label">Starting Bid Price</label>
                        <input type="number" class="form-control" id="startingPrice" name="startingPrice"
                            placeholder="Enter a Starting Bid Price" min="0.01" step="0.01" required />
                    </div>
                    <div class="mb-3">
                        <!-- Prompt user for end time -->
                        <label for="endTime" class="form-label">End Time</label>
                        <input type="datetime-local" class="form-control" id="endTime" name="endTime" required />
                    </div>
                </div>
                <!-- Submit button to create media and cancel to go back -->
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                <a href="index.php" class="btn btn-secondary mt-3">Cancel</a>
            </form>
        </div>
    </main>
    <div id="footer" style="padding-top: 6vh;"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>