<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized Access</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #90caf9);
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .unauthorized-container {
            text-align: center;
            background: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .unauthorized-container h1 {
            color: #dc3545;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .unauthorized-container p {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .unauthorized-container .btn {
            border-radius: 20px;
            padding: 10px 30px;
            font-size: 1rem;
            font-weight: bold;
        }

        .unauthorized-container .btn-primary {
            background-color: #1e88e5;
            border: none;
        }

        .unauthorized-container .btn-primary:hover {
            background-color: #1565c0;
        }
    </style>
</head>

<body>
    <div class="unauthorized-container">
        <!-- Icon (Optional) -->
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-lock-fill text-danger mb-3" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
        </svg>

        <!-- Title -->
        <h1>Unauthorized Access</h1>

        <!-- Message -->
        <p>You do not have permission to view this page. Please contact the administrator if you believe this is an error.</p>

        <!-- Action Button -->
        <a href="../User_login.php" class="btn btn-primary">Go to Homepage</a>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>