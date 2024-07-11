<?php
// Connect to the database
require_once 'db_connection.php';

// Check if logged in
$loggedIn = isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true;

// Get itemID
$itemID = $_GET["itemID"];
$profileID = $loggedIn ? $_SESSION["ProfileID"] : null;

// Initialize variables
$title = "";
$description = "";
$startTime = "";
$endTime = "";
$startingPrice = "";
$highestBid = "";
$sellerProfile = "";
$sellerUsername = "";
$buyerProfile = "";
$buyerUsername = "";

// Query
$query = "SELECT title, description, startTime, endTime, startingPrice, highestBid, sellerProfile, buyerProfile FROM auction_item WHERE itemID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $itemID);

if ($stmt->execute()) {
    $stmt->bind_result($title, $description, $startTime, $endTime, $startingPrice, $highestBid, $sellerProfile, $buyerProfile);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "Error fetching item details.";
    exit;
}

// Query to retrieve seller's username
$query2 = "SELECT username FROM user_profile WHERE profileID = ?";
$stmt2 = $conn->prepare($query2);
$stmt2->bind_param("i", $sellerProfile);

if ($stmt2->execute()) {
    $stmt2->bind_result($sellerUsername);
    $stmt2->fetch();
    $stmt2->close();
} else {
    echo "Error fetching seller username.";
    exit;
}

// Fetch the username of the highest bidder if one exists
if (!empty($buyerProfile)) {
    $query3 = "SELECT username FROM user_profile WHERE profileID = ?";
    $stmt3 = $conn->prepare($query3);
    $stmt3->bind_param("i", $buyerProfile);

    if ($stmt3->execute()) {
        $stmt3->bind_result($buyerUsername);
        $stmt3->fetch();
        $stmt3->close();
    } else {
        echo "Error fetching buyer username.";
        exit;
    }
}

// Check if the auction has ended
$currentDateTime = new DateTime();
$auctionEndDateTime = new DateTime($endTime);
$auctionEnded = $currentDateTime >= $auctionEndDateTime;

// Process bid submission
if ($loggedIn && $_SERVER["REQUEST_METHOD"] == "POST") {
    $bidAmount = $_POST["bidAmount"];

    // Validate bid amount
    if (!$auctionEnded) {
        if (is_null($highestBid)) {
            if ($bidAmount > $startingPrice) {
                // Update highestBid and buyerProfile
                $updateQuery = "UPDATE auction_item SET highestBid = ?, buyerProfile = ? WHERE itemID = ?";
                $updateStmt = $conn->prepare($updateQuery);
                $updateStmt->bind_param("dii", $bidAmount, $profileID, $itemID);

                if ($updateStmt->execute()) {
                    $highestBid = $bidAmount;

                    // Insert into bid table
                    $currentDateTime = (new DateTime())->format('Y-m-d H:i:s');
                    $bidQuery = "INSERT INTO bid (amount, bidTime, profileID, itemID) VALUES (?, ?, ?, ?)";
                    $bidStmt = $conn->prepare($bidQuery);
                    $bidStmt->bind_param("dsii", $bidAmount, $currentDateTime, $profileID, $itemID);

                    if ($bidStmt->execute()) {
                        echo "Your bid is placed successfully.";
                    } else {
                        echo "Error recording your bid.";
                    }

                    $bidStmt->close();
                } else {
                    echo "Error placing your bid.";
                }

                $updateStmt->close();
            } else {
                echo "Your bid must be higher than the starting price.";
            }
        } else {
            if ($bidAmount > $highestBid) {
                // Update highestBid and buyerProfile
                $updateQuery = "UPDATE auction_item SET highestBid = ?, buyerProfile = ? WHERE itemID = ?";
                $updateStmt = $conn->prepare($updateQuery);
                $updateStmt->bind_param("dii", $bidAmount, $profileID, $itemID);

                if ($updateStmt->execute()) {
                    $highestBid = $bidAmount;

                    // Insert into bid table
                    $currentDateTime = (new DateTime())->format('Y-m-d H:i:s');
                    $bidQuery = "INSERT INTO bid (amount, bidTime, profileID, itemID) VALUES (?, ?, ?, ?)";
                    $bidStmt = $conn->prepare($bidQuery);
                    $bidStmt->bind_param("dsii", $bidAmount, $currentDateTime, $profileID, $itemID);

                    if ($bidStmt->execute()) {
                        echo "Your bid is placed successfully.";
                    } else {
                        echo "Error recording your bid.";
                    }

                    $bidStmt->close();
                } else {
                    echo "Error placing your bid.";
                }

                $updateStmt->close();
            } else {
                echo "Your bid must be higher than the current highest bid.";
            }
        }
    } else {
        echo "Auction has ended. You cannot place a bid.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>View Item Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&family=Poppins:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="css/style.css" rel="stylesheet" />
    <script>
        // Load header and footer
        $(function () {
            $("#header").load("header.php");
            $("#footer").load("footer.html");
        });
    </script>
    <style>
        .view-item-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .item-fields-header {
            font-size: 22px;
            color: #333;
            margin-top: 20px;
            font-weight: bold;
        }

        .fieldheader {
            font-size: 18px;
            color: #555;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div id="header"></div>
    <main>
        <div class="view-item-container">
            <div class="px-4 py-5 my-5">
                <div class="text-center">
                    <h2 class="display-5 fw-bold text-body-emphasis">
                        View <span class="blue">Item </span><span class="orange">Details </span>
                    </h2>
                </div>
                <p class="mt-3 mb-3"></p>
                <div class="mb-3">
                    <div class="image-container">
                        <img class="d-block mx-auto mb-4 profile-image"
                            src="images/auction_items/<?php echo $itemID; ?>.jpg" alt="Profile Image" width="150"
                            height="150" />
                    </div>
                    <!-- Display item details -->
                    <h3 class="item-fields-header">Title</h3>
                    <div class="fieldheader">
                        <?php echo htmlspecialchars($title); ?>
                    </div>
                    <h3 class="item-fields-header">Description</h3>
                    <div class="fieldheader">
                        <?php echo htmlspecialchars($description); ?>
                    </div>
                    <h3 class="item-fields-header">Start Time</h3>
                    <div class="fieldheader">
                        <?php echo htmlspecialchars($startTime); ?>
                    </div>
                    <h3 class="item-fields-header">End Time</h3>
                    <div class="fieldheader">
                        <?php echo htmlspecialchars($endTime); ?>
                    </div>
                    <h3 class="item-fields-header">Starting Price</h3>
                    <div class="fieldheader">
                        <?php echo htmlspecialchars($startingPrice); ?>
                    </div>
                    <!-- If highest bid display it  -->
                    <?php if (!empty($highestBid)): ?>
                        <h3 class="item-fields-header">Highest Bid</h3>
                        <div class="fieldheader">
                            <?php echo htmlspecialchars($highestBid); ?>
                        </div>
                    <?php endif; ?>
                    <!-- If bidder exists and auction is over or not -->
                    <?php if (!empty($buyerUsername)): ?>
                        <h3 class="item-fields-header">
                            <?php echo ($auctionEnded) ? 'Bought By' : 'Current Highest Bidder'; ?>
                        </h3>
                        <div class="fieldheader">
                            <?php echo htmlspecialchars($buyerUsername); ?>
                        </div>
                    <?php endif; ?>
                    <h3 class="item-fields-header">Sold By</h3>
                    <div class="fieldheader">
                        <?php echo htmlspecialchars($sellerUsername); ?>
                    </div>
                    <!-- If auction is not over and item does not belong to you -->
                    <?php if ($loggedIn && !$auctionEnded && $profileID != $sellerProfile): ?>
                        <form method="post">
                            <div class="mb-3">
                                <label for="bidAmount" class="form-label">Enter your bid</label>
                                <input type="number" class="form-control" id="bidAmount" name="bidAmount" step="0.01"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg px-4 me-2">Place Bid</button>
                        </form>
                    <?php elseif (!$loggedIn): ?>
                        <div class="text-center mt-4">
                            <a href="login.php" class="btn btn-primary btn-lg px-4 me-2">Login to Place Bid</a>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-between mt-4">
                        <!-- Link to go back to item list -->
                        <a href="welcome.php" class="btn btn-primary btn-lg px-4 me-2">Back to Items</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="footer" style="padding-top: 6vh;"></div>
</body>

</html>