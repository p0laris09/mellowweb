<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css">
    <style>
        /* Ensure the body and html are full height */
        html, body {
            height: 100%;
            margin: 0;
        }
        /* Container that takes up at least the full height minus the footer */
        .content {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container {
            flex: 1;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">Mellow</a>
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
                <!-- Notifications Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell-fill" style="font-size: 1.5rem; color: #ffffff;" title="Notifications"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="#" class="dropdown-item">Notification 1</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="#" class="dropdown-item">Notification 2</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="#" class="dropdown-item">Notification 3</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="#" class="dropdown-item">Notification 4</a></li>
                    </ul>
                </li>
                <!-- Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill" style="font-size: 1.5rem; color: #ffffff;" title="Profile"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="#" class="dropdown-item">Profile</a></li>
                        <li><a href="#" class="dropdown-item">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="logout.php" class="dropdown-item">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="content">
    <div class="container mt-5">
        <h1>Welcome, <?= htmlspecialchars($_SESSION['user']['first_name']) ?>!</h1>
        <p>You are now logged in. Here’s your dashboard.</p>
        
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text">Manage your account details.</p>
                        <a href="profile.php" class="btn btn-primary">Go to Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Settings</h5>
                        <p class="card-text">Configure your app settings.</p>
                        <a href="settings.php" class="btn btn-primary">Go to Settings</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Log Out</h5>
                        <p class="card-text">Sign out of your account.</p>
                        <a href="logout.php" class="btn btn-danger">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
