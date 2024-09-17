<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mellow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include 'header.php'; // Adjust the path to your header.php ?>

    <div class="container mt-5">
        <h1>Welcome to Mellow</h1>
        <p>Your task management solution!</p>
        <!-- Get Started Button -->
        <a href="sign_in.php" class="btn btn-primary btn-get-started">Get Started</a>
    </div>

    <?php include 'footer.php'; // Adjust the path to your footer.php ?>

    <!-- Include Bootstrap's JavaScript for responsive navbar and other features -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>
</html>
