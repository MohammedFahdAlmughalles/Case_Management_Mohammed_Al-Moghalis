<?php
include "Configs/db_connection.php";
global $conn;








?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litigant Login</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">
    <link rel="stylesheet" href="css/Bondi.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #90caf9); /* Soothing gradient background */
            height: 100vh;
        }
        .login-container {
            max-width: 500px; /* Restrict form width for better focus */
            background: #ffffff; /* White background for contrast */
            padding: 30px;
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Subtle shadow */
        }
        .form-title {
            text-align: center; /* Center title */
            font-weight: bold;
            color: #1e88e5; /* Matching the background */
        }
        .custom-button {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .custom-button:hover {
            transform: scale(1.05); /* Slight enlargement on hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); /* Elevated shadow on hover */
        }
    </style>

    <script>
            // Clear URL parameters after the page has loaded
            window.onload = function () {
                const url = new URL(window.location);
                url.search = ''; // Clear the query string
                window.history.replaceState({}, document.title, url);
            };
        </script>

</head>



<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container-sm">
        <div class="card p-4 shadow-lg border-0 rounded-4 mx-auto" style="max-width: 400px;">
            <h2 class="text-center text-primary fw-bold mb-4">Log In</h2>

            <!-- Success Message -->
            <?php if (isset($_GET['success']) && $_GET['success'] == 'Account Created Successfully'): ?>
                <div class="alert alert-success text-center p-2 rounded-3">✅ Account Created Successfully</div>
            <?php endif ?>

            <!-- Error Messages -->
            <?php if (isset($_GET['error']) && $_GET['error'] == 'empty_data'): ?>
                <div class="alert alert-danger text-center p-2 rounded-3">⚠️ Both Fields are Required</div>
            <?php endif ?>

            <?php if (isset($_GET['error']) && $_GET['error'] == 'Wrong Password or Email'): ?>
                <div class="alert alert-danger text-center p-2 rounded-3">❌ Wrong Password or Email</div>
            <?php endif ?>


            
            <?php if (isset($_GET['error']) && $_GET['error'] == 'Please login first'): ?>
                <div class="alert alert-danger text-center p-2 rounded-3">❌ Please login first</div>
            <?php endif ?>



            <form method="POST" action="Configs/config.php">
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="text" id="email" class="form-control shadow-sm rounded-3" name="email" placeholder="Enter your email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" id="password" class="form-control shadow-sm rounded-3" name="password" placeholder="Enter your password">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold rounded-3">Log In</button>
                </div>

                <div class="text-center mt-3">
                    <p class="mb-0">Don't have an account? <a href="signup.php" class="text-decoration-none fw-bold text-primary">Sign up</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>



