<?php
require_once 'db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["parentID"]) && isset($_POST["bidTime"])) {
        $parentID = $_POST["parentID"];
        $bidTime = $_POST["bidTime"];

        $stmt = $conn->prepare("SELECT a.title, a.description, b.amount, b.bidTime 
                                FROM AUCTION_ITEM a 
                                INNER JOIN BID b ON a.itemID = b.itemID 
                                INNER JOIN CATEGORY c ON a.categoryID = c.categoryID 
                                WHERE c.parentID = ? AND b.bidTime = ? 
                                ORDER BY b.bidTime");
        $stmt->bind_param("is", $parentID, $bidTime);

        $stmt->execute();
        $result = $stmt->get_result();

        $_SESSION['query_results'] = [];
        while ($row = $result->fetch_assoc()) {
            $_SESSION['query_results'][] = $row;
        }

        $stmt->close();

        header("Location: displayResults.php");
        exit();
    } else {
        echo "Please provide both parent ID and bid time.";
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Media Collection</title>
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
        .create-profile-container {
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
            <div class="px-4 py-5 my-5">
                <img class="d-block mx-auto mb-4 text-center" src="images\placeholder.jpg" alt="" width="72"
                    height="57" />
                <h2 class="display-5 fw-bold text-body-emphasis text-center">
                    Create <span class="blue">New </span><span class="orange">Report</span>
                </h2>
                <p class="mt-3 mb-3 text-center">
                </p>
                <!-- Form for Adding new media -->
                <form action="reportCategoryDate.php" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <!-- Prompt user for item condition -->
                        <label for="parentID" class="form-label">Item Category</label>
                        <select class="form-select" id="parentID" name="parentID" aria-describedby="parentID" required>
                            <option value="" disabled selected>Select item category</option>
                            <option value="1">Automobile</option>
                            <option value="5">Antiques</option>
                            <option value="9">Jewelry</option>
                            <option value="13">Watches</option>
                            <option value="16">Home & Garden</option>
                            <option value="19">Electronics</option>
                            <option value="21">Books</option>
                            <option value="24">Clothes</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <!-- Prompt user for bid time -->
                        <label for="bidTime" class="form-label">Bid Time</label>
                        <input type="date" class="form-control" id="bidTime" name="bidTime" placeholder="Enter Bid Time"
                            required />
                    </div>

                    <!-- Submit button to create media and cancel to go back -->
                    <button type="submit" class="btn btn-primary mt-3">
                        Submit
                    </button>
                    <a href="index.php" class="btn btn-secondary mt-3">Cancel</a>
                </form>
            </div>
        </div>
    </main>
    <div id="footer" style="padding-top: 6vh;"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>