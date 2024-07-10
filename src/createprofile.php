<?php
// Connect to database
require_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect input for profile creation
    $username = mysqli_real_escape_string($conn, $_POST["Username"]);
    $email = mysqli_real_escape_string($conn, $_POST["Email"]);
    $password = mysqli_real_escape_string($conn, $_POST["Password"]);
    $firstName = mysqli_real_escape_string($conn, $_POST["FirstName"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["LastName"]);
    $address = mysqli_real_escape_string($conn, $_POST["Address"]);
    $creditCard = mysqli_real_escape_string($conn, $_POST["CreditCard"]);
    $isAdmin = isset($_POST["isAdmin"]) ? 1 : 0;

    // Validate input
    if (empty($username) || empty($password) || empty($email) || empty($firstName) || empty($lastName)) {
        echo "All fields except address and credit card are required.";
    } else {
        // Check if username already exists
        $sql = "SELECT username FROM user_profile WHERE username = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                // Username already exists
                echo "Username already taken. Please choose another one.";
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert user data into the database
                $sql_insert = "INSERT INTO user_profile (username, email, password, firstName, lastName, address, creditCard, isAdmin) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

                if ($stmt_insert = $conn->prepare($sql_insert)) {
                    $stmt_insert->bind_param("sssssssi", $username, $email, $hashedPassword, $firstName, $lastName, $address, $creditCard, $isAdmin);
                    if ($stmt_insert->execute()) {
                        $profileId = $stmt_insert->insert_id; // Get the inserted profileID

                        // File upload handling
                        if (isset($_FILES['uploadfile'])) {
                            $filename = $_FILES['uploadfile']['name'];
                            $tempname = $_FILES['uploadfile']['tmp_name'];
                            $fileExt = pathinfo($filename, PATHINFO_EXTENSION);
                            $newFilename = $profileId . "." . $fileExt; // Construct new filename

                            $folder = "./images/";
                            $destination = $folder . $newFilename;

                            // Move image into folder
                            if (move_uploaded_file($tempname, $destination)) {
                                echo "<h3>Image uploaded successfully!</h3>";
                            } else {
                                echo "<h3>Failed to upload image!</h3>";
                            }
                        }

                        echo "Profile created successfully.";
                        // Redirect to login page
                        header("Location: login.php");
                        exit;
                    } else {
                        echo "Error: " . $stmt_insert->error;
                    }
                    $stmt_insert->close();
                } else {
                    echo "Error preparing statement: " . $conn->error;
                }
            }
            $stmt->close();
        } else {
            echo "Error executing database query.";
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
            <div class="px-4">
                <h2 class="display-5 fw-bold text-body-emphasis text-center">
                    Sign up for <span class="blue">u</span><span class="orange">Bid</span>
                </h2>
                <p class="mt-3 mb-3 text-center">
                    Please enter your personal information to create an account.
                </p>
                <!-- Form for profile creation -->
                <form action="createprofile.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <!-- Prompt user for First name -->
                        <label for="FirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="FirstName" name="FirstName"
                            placeholder="Enter first name" required />
                    </div>
                    <div class="mb-3">
                        <!-- Prompt user for Last name -->
                        <label for="LastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="LastName" name="LastName"
                            placeholder="Enter last name" required />
                    </div>
                    <div class="mb-3">
                        <!-- Prompt user for Username -->
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="Username" name="Username"
                            placeholder="Enter user name" required />
                        <div class="">
                        </div>
                        <div class="mb-3">
                            <!-- Prompt user for password -->
                            <label for="Password" class="form-label">Password</label>
                            <input type="Password" class="form-control" id="Password" name="Password"
                                placeholder="Enter password" required />
                        </div>
                        <div class="mb-3">
                            <!-- Prompt user for email -->
                            <label for="Email" class="form-label">Email</label>
                            <input type="Email" class="form-control" id="Email" name="Email" placeholder="Enter email"
                                required />
                        </div>
                        <div class="mb-3">
                            <!-- Prompt user for address -->
                            <label for="Address" class="form-label">Shipping Address</label>
                            <input type="Address" class="form-control" id="Address" name="Address"
                                placeholder="Enter Address" />
                        </div>
                        <div class="mb-3">
                            <!-- Prompt user for credit card -->
                            <label for="CreditCard" class="form-label">Credit Card</label>
                            <input type="tel" class="form-control" id="CreditCard" name="CreditCard" inputmode="numeric"
                                placeholder="Enter Credit Card" />
                        </div>
                        <div class="form-group">
                            <!-- Prompt user for profile picture -->
                            <label for="ProfilePicture" class="form-label">Profile Picture</label>
                            <input class="form-control" type="file" name="uploadfile" value="" />
                        </div>
                        <div class="mb-3">
                            <!-- Set user as admin -->
                            <input type="checkbox" id="isAdmin" name="isAdmin" value="1">
                            <label for="isAdmin">Administrator</label>
                        </div>
                        <!-- Submit button to create profile and cancel to go back -->
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
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