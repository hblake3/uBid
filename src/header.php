<?php
// Connect to database
require_once 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<!-- Header -->

<head>
    <title>Ubid Header</title>
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

                    <!-- Display admin reports link if user is admin -->
                    <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true): ?>
                        <li>
                            <span class="fas fa-solid fa-file-text" id="headIcon"></span>
                            <a href="report.php">Admin Reports</a>
                        </li>
                    <?php endif; ?>

                    <!-- If the user is not logged in, show the Login header link-->
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
            </li>
            <li class="dropdown">
                <a href="category.php?categoryID=1" class="dropbtn">Automobiles</a>
            </li>
            <li class="dropdown">
                <a href="category.php?categoryID=9" class="dropbtn">Jewelry</a>
            </li>
            <li class="dropdown">
                <a href="category.php?categoryID=13" class="dropbtn">Watches</a>
            </li>
            <li class="dropdown">
                <a href="category.php?categoryID=16" class="dropbtn">Home & Garden</a>
            </li>
            <li class="dropdown">
                <a href="category.php?categoryID=24" class="dropbtn">Clothing</a>
            </li>
        </ul>
    </nav>