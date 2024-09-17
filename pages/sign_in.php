<!-- sign_in.php -->
<?php
require '../config.php'; // Config file for database connection

// Start session if not started already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ensure form submission is working
    if (empty($email) || empty($password)) {
        $error = "Email and password are required!";
    } else {
        // Prepare and execute the query to find the user by email
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Verify if the user exists and the password matches
        if ($user && password_verify($password, $user['password'])) {
            // Store the user data in the session and redirect to dashboard
            $_SESSION['user'] = $user;

            // Debug to ensure redirection works
            if (headers_sent()) {
                echo "<script>window.location.href='dashboard.php';</script>";
            } else {
                header("Location: dashboard.php");
                exit;
            }
        } else {
            // Error handling for invalid credentials
            $error = "Invalid login credentials. Please try again.";
        }
    }
}
?>
<?php include 'header.php'; ?>
<div class="container mt-5">
    <h2>Sign In</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" required>
                <span class="input-group-text">
                    <i class="bi bi-eye" id="togglePassword" onclick="togglePasswordVisibility()" style="cursor: pointer;"></i>
                </span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
    <p class="mt-3">Don't have an account? <a href="sign_up.php">Sign Up</a></p>
</div>
<?php include 'footer.php'; ?>
