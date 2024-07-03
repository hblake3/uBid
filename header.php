<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- Header -->

<head>
    <title>My Media Collection Header</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
</head>

<body class="header-body">
    <script>
        const toggle = () => {
            document.getElementById('nav').classList.toggle('navactive')
        };
    </script>
    <header>
        <div class="brand">
            <h1 class="blue-class">uBid</h1>
        </div>

        <!-- Account function navigation buttons -->
        <span class="fas fa-solid fa-bars" id="menuIcon" onclick="toggle()"></span>
        <div class="navbar" id="nav">
            <ul class="header-ul p-4">
                <li>
                    <span class="fas fa-home" id="headIcon"></span>
                    <a href="index.php">Home</a>
                </li>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <li>
                        <span class="fas fa-solid fa-user" id="headIcon"></span>
                        <a href="viewprofile.php">Profile</a>
                    </li>
                    <li>
                        <span class="fas fa-solid fa-lock" id="headIcon"></span>
                        <a href="logout.php">Sign Out</a>
                    </li>

                    <!-- display admin reports link if user is admin -->
                    <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true): ?>
                        <li>
                            <span class="fas fa-solid fa-file-text" id="headIcon"></span>
                            <a href="report.php">Admin Reports</a>
                        </li>
                    <?php endif; ?>

                    <!-- if the user is not logged in, show the Login header link-->
                <?php else: ?>
                    <li>
                        <span class="fas fa-solid fa-sign-in-alt" id="headIcon"></span>
                        <a href="login.php">Login</a>
                    </li>

                <?php endif; ?>
            </ul>
        </div>
    </header>

    <!-- Categories Nav Menu -->

    <nav class="category-nav">
        <ul class="category-ul">
            <li class="dropdown">
                <a href="category.php" class="dropbtn">Antiques</a>
                <div class="dropdown-content">
                    <a href="category.php">Furniture</a>
                    <a href="category.php">Art</a>
                    <a href="category.php">Decorative Arts</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php" class="dropbtn">Automobiles</a>
                <div class="dropdown-content">
                    <a href="category.php">Classic Cars</a>
                    <a href="category.php">Motorcycles</a>
                    <a href="category.php">Parts & Accessories</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php" class="dropbtn">Jewelry</a>
                <div class="dropdown-content">
                    <a href="category.php">Necklaces</a>
                    <a href="category.php">Rings</a>
                    <a href="category.php">Earrings</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php" class="dropbtn">Watches</a>
                <div class="dropdown-content">
                    <a href="category.php">Luxury Watches</a>
                    <a href="category.php">Vintage Watches</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php" class="dropbtn">Home & Garden</a>
                <div class="dropdown-content">
                    <a href="category.php">Furniture</a>
                    <a href="category.php">Garden Tools</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php" class="dropbtn">Electronics</a>
                <div class="dropdown-content">
                    <a href="category.php">Computers</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php" class="dropbtn">Books</a>
                <div class="dropdown-content">
                    <a href="category.php">Adult</a>
                    <a href="category.php">Children</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php" class="dropbtn">Clothing</a>
                <div class="dropdown-content">
                    <a href="category.php">Jackets</a>
                    <a href="category.php">Ties</a>
                    <a href="category.php">Socks</a>
                </div>
            </li>
        </ul>
    </nav>
</body>

</html>