<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mellow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .container {
            flex: 1;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">Mellow</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="index.php">Task Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="index.php">Collab</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="dashboard.php"><i class="bi bi-person"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#"><i class="bi bi-bell"></i></a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="sign_in.php" class="btn btn-light">Sign In</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a href="sign_up.php" class="btn btn-primary">Sign Up</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
