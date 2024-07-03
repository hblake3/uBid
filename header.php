<?php
require_once 'db_connection.php';
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
                <a href="category.php?categoryID=5" class="dropbtn">Antiques</a>
                <div class="dropdown-content">
                    <a href="category.php?categoryID=1&type=furniture">Furniture</a>
                    <a href="category.php?categoryID=1&type=art">Art</a>
                    <a href="category.php?categoryID=1&type=decorative_arts">Decorative Arts</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php?categoryID=1" class="dropbtn">Automobiles</a>
                <div class="dropdown-content">
                    <a href="category.php?categoryID=2&type=classic_cars">Classic Cars</a>
                    <a href="category.php?categoryID=2&type=motorcycles">Motorcycles</a>
                    <a href="category.php?categoryID=2&type=parts_accessories">Parts & Accessories</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php?categoryID=9" class="dropbtn">Jewelry</a>
                <div class="dropdown-content">
                    <a href="category.php?categoryID=3&type=necklaces">Necklaces</a>
                    <a href="category.php?categoryID=3&type=rings">Rings</a>
                    <a href="category.php?categoryID=3&type=earrings">Earrings</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php?categoryID=13" class="dropbtn">Watches</a>
                <div class="dropdown-content">
                    <a href="category.php?categoryID=4&type=luxury_watches">Luxury Watches</a>
                    <a href="category.php?categoryID=4&type=vintage_watches">Vintage Watches</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php?categoryID=16" class="dropbtn">Home & Garden</a>
                <div class="dropdown-content">
                    <a href="category.php?categoryID=5&type=furniture">Furniture</a>
                    <a href="category.php?categoryID=5&type=garden_tools">Garden Tools</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php?categoryID=19" class="dropbtn">Electronics</a>
                <div class="dropdown-content">
                    <a href="category.php?categoryID=6&type=computers">Computers</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php?categoryID=21" class="dropbtn">Books</a>
                <div class="dropdown-content">
                    <a href="category.php?categoryID=7&type=adult">Adult</a>
                    <a href="category.php?categoryID=7&type=children">Children</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="category.php?categoryID=24" class="dropbtn">Clothing</a>
                <div class="dropdown-content">
                    <a href="category.php?categoryID=8&type=jackets">Jackets</a>
                    <a href="category.php?categoryID=8&type=ties">Ties</a>
                    <a href="category.php?categoryID=8&type=socks">Socks</a>
                </div>
            </li>
        </ul>
    </nav>