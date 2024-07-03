<?php
require_once 'db_connection.php';
if (!isset($_SESSION['query_results'])) {
    echo "No results found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Query Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&family=Poppins:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Query Results</h2>
        <?php foreach ($_SESSION['query_results'] as $row): ?>
            <p>
                Title: <?= htmlspecialchars($row["title"]) ?><br>
                Description: <?= htmlspecialchars($row["description"]) ?><br>
                Amount: <?= htmlspecialchars($row["amount"]) ?><br>
                Bid Time: <?= htmlspecialchars($row["bidTime"]) ?><br><br>
            </p>
        <?php endforeach; ?>
    </div>
</body>

</html>