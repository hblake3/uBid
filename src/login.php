<?php
// Connect to database
require_once 'db_connection.php';

// Initialize message variable
$message = "";

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect input
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if (!isset($_SESSION['loginAttempts'])) {
        $_SESSION['loginAttempts'] = 3;
    }

    // Validate input
    if (empty($username) || empty($password)) {
        $message = "Username and password are required.";
    } else {
        // Query to check for user
        $sql = "SELECT * FROM user_profile WHERE username = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // If user is found
                $row = $result->fetch_assoc();
                if (password_verify($password, $row["password"])) {
                    // If password is correct then set session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["Username"] = $username;
                    $_SESSION["ProfileID"] = $row["profileID"];
                    $_SESSION["isAdmin"] = $row["isAdmin"] == 1; // Check if user is an admin
                    $_SESSION['loginAttempts'] = 3; // Reset login attempts

                    // Redirect to welcome page
                    header("Location: welcome.php");
                    exit;
                } else {
                    $_SESSION['loginAttempts']--;
                    $message = "Invalid password. Attempts remaining: " . $_SESSION['loginAttempts'];
                    if ($_SESSION['loginAttempts'] <= 0) {
                        $message .= "<br>Maximum login attempts reached. Please try again later.";
                        // Redirect to logout.php after a delay of 3 seconds
                        header("Refresh: 3; URL=logout.php");
                        exit;
                    }
                }
            } else {
                $message = "Invalid username.";
            }
            $stmt->close();
        } else {
            $message = "Error executing database query.";
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>uBid - Electronics, Cars, Fashion, Collectibles & More!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&family=Poppins:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

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
    <div class="login-container">
        <div class="px-4 pt-2 text-center">
            <h2 class="display-5 fw-bold text-body-emphasis">
                Log in to <span class="blue">u</span><span class="orange">Bid</span>
            </h2>
            <?php if (!empty($message)): ?>
                <p><?php echo htmlspecialchars($message); ?></p>
            <?php endif; ?>
            <!-- Prompt user to login -->
            <p class="mt-3 mb-3">
                Please enter your username and password to log in.
            </p>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <!-- Prompt user for username -->
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"
                        required />
                </div>
                <div class="mb-3">
                    <!-- Prompt user for password -->
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter password" required />
                </div>
                <!-- Submit button to login -->
                <button type="submit" class="btn btn-primary mt-3">Log In</button>
            </form>
            <p class="pt-5 pb-2">Don't have an account?</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <!-- Link to create a profile -->
                <a href="createProfile.php" class="btn btn-primary btn-sm">Create Account</a>
            </div>
        </div>
    </div>
    <div id="footer" style="padding-top: 6vh"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>