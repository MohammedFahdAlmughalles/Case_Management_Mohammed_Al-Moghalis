<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
            body {
            background: linear-gradient(to right, #e3f2fd, #90caf9); /* Soothing gradient background */
            height: 100vh;
        }
</style>
<script>
window.onload = function() {
    // Check if there are any URL parameters
    if (window.location.search.length > 0) {
        // Remove URL parameters without reloading the page
        window.history.replaceState({}, document.title, window.location.pathname);
    }
};

</script>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow-lg">
                <h2 class="text-center mb-4">Sign Up</h2>
                <?php if (isset($_GET['error']) && $_GET['error'] == 'Email Already Exist'): ?>
                     <p class="alert alert-danger text-center">Email Already Exist</p>
                <?php endif ?>
                <form method="POST" action="Configs/signup_process.php">
                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label" >Email</label>
                        <input type="email" id="email" class="form-control border border-primary" name="email" placeholder="Enter your email" required>
                    </div>

                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control border border-primary" name="name" placeholder="Enter your full name" required>
                    </div>

                    <!-- Address Field -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" class="form-control border border-primary" name="address" placeholder="Enter your address" required>
                    </div>

                    <!-- Phone Field -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" id="phone" class="form-control border border-primary" name="phone" placeholder="Enter your phone number" required>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control border border-primary" name="password" placeholder="Enter your password" required>
                    </div>

                    <!-- Role Dropdown -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" class="form-select border border-primary" name="role" required>
                            <option value="" disabled selected>Select your role</option>
                            <option value="User">User</option>
                            <option value="Head of court">Head of court</option>
                            <option value="judge">judge</option>
                            <option value="clerk">clerk</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                    </div>
                </form>

                <!-- Already have an account? -->
                <div class="text-center mt-3">
                    <p>Already have an account? <a href="User_login.php" class="text-primary">Log in</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
