<?php
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = ucfirst(strtolower($_POST['first_name']));
    $middle_name = ucfirst(strtolower($_POST['middle_name']));
    $last_name = ucfirst(strtolower($_POST['last_name']));
    $phone_number = $_POST['phone_number'];
    $college = $_POST['college'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validate phone number format
    if (!preg_match('/^09\d{2}-\d{3}-\d{4}$/', $phone_number)) {
        $error = "Invalid phone number format. Please use '09XX-XXX-XXXX'.";
    } else {
        // Insert into database
        $stmt = $pdo->prepare("INSERT INTO users (first_name, middle_name, last_name, phone_number, college, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$first_name, $middle_name, $last_name, $phone_number, $college, $email, $password]);

        header("Location: sign_in.php");
        exit;
    }
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2>Sign Up</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="mb-3">
            <label for="middle_name" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="09XX-XXX-XXXX" required>
        </div>
        <div class="mb-3">
            <label for="college" class="form-label">College</label>
            <select class="form-control" id="college" name="college" required>
                <option value="">Select College</option>
                <option value="College of Liberal Arts and Sciences">College of Liberal Arts and Sciences</option>
                <option value="College of Human Kinetics">College of Human Kinetics</option>
                <option value="College of Business and Financial Sciences">College of Business and Financial Sciences</option>
                <option value="College of Computing and Information Sciences">College of Computing and Information Sciences</option>
                <option value="College of Innovative Teacher Education">College of Innovative Teacher Education</option>
                <option value="College of Governance and Public Policy">College of Governance and Public Policy</option>
                <option value="College of Construction Sciences and Engineering">College of Construction Sciences and Engineering</option>
                <option value="College of Technology Management">College of Technology Management</option>
                <option value="College of Tourism and Hospitality Management">College of Tourism and Hospitality Management</option>
                <option value="College of Continuing, Advanced and Professional Studies">College of Continuing, Advanced and Professional Studies</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>

<?php include 'footer.php'; ?>

<script>
    // Convert the first letter to uppercase and the rest to lowercase
    document.querySelectorAll('input[name="first_name"], input[name="middle_name"], input[name="last_name"]').forEach(input => {
        input.addEventListener('blur', function() {
            this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1).toLowerCase();
        });
    });

    // Auto-format phone number and restrict input to numbers only
    const phoneInput = document.getElementById('phone_number');
    phoneInput.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, ''); // Remove non-numeric characters
        if (value.length > 11) value = value.slice(0, 11); // Limit to 11 digits
        this.value = value.replace(/(\d{2})(\d{3})(\d{4})/, '09$1-$2-$3'); // Format with hyphens
    });

    // Validate phone number format on form submission
    document.querySelector('form').addEventListener('submit', function(event) {
        const phoneNumber = document.getElementById('phone_number').value;
        if (!/^09\d{2}-\d{3}-\d{4}$/.test(phoneNumber)) {
            alert("Invalid phone number format. Please use '09XX-XXX-XXXX'.");
            event.preventDefault(); // Prevent form submission
        }
    });
</script>
