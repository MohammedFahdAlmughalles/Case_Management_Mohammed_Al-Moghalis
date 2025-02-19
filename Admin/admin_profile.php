<?php
session_start();
// Verify admin authentication
// if(!isset($_SESSION['Email']) || $_SESSION['Role'] !== 'admin') {
//     header("Location: login.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="../css/admin.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .btn-primary {
            border-radius: 20px;
        }

        .btn-danger {
            border-radius: 20px;
        }

        .navbar {
            background-color: #1e88e5 !important;
        }

        .navbar .container-fluid {
            justify-content: space-between;
            /* Adjusted to space between logo and logout button */
        }

        .navbar-brand {
            color: #ffffff !important;
            font-size: 1.75rem;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Navbar Brand -->
            <span class="navbar-brand mb-0">JMS - Case Management</span>





            <!-- Logout Button -->
            <div>
                <a href="../logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>
    <div class="admin-container">
        <!-- Sidebar Navigation -->
        <div class="sidebar">
            <h3 class="text-white mb-4 text-center">Control Panel</h3>
            <button class="nav-button" onclick="loadContent('users')">
                <i class="fas fa-users"></i>
                Manage Users
            </button>

            <button class="nav-button" onclick="loadContent('cases')">
                <i class="fas fa-folder-open"></i>
                Manage Cases
                <!-- <span class="notification-badge">12</span> -->
            </button>

            <button class="nav-button" onclick="loadContent('logs')">
                <i class="fas fa-clipboard-list"></i>
                System Logs
            </button>

            <button class="nav-button" onclick="loadContent('settings')">
                <i class="fas fa-cogs"></i>
                Future Settings
            </button>
        </div>

        <!-- Main Content Area -->
        <div class="content-area">
            <div id="content-display">
                <h4 class="text-muted">Welcome, </h4>
                <p class="text-muted">Select an option from the sidebar to begin management</p>
                <!-- <?php echo $_SESSION['Name']; ?> -->
            </div>
        </div>
    </div>

    <script>
        function loadContent(type) {
            switch (type) {
                case 'users':
                    window.location.href = 'admin_list/manage_users.php';
                    break;
                case 'cases':
                    window.location.href = 'admin_list/manage_cases.php';
                    break;
                case 'logs':
                    window.location.href = 'admin_list/system_logs.php';
                    break;
                case 'settings':
                    window.location.href = 'admin_list/future_settings.php';
                    break;
                default:
                    window.location.href = '404.html'; // Redirect to a 404 or error page if the value doesn't match any case
            }
        }
    </script>
</body>

</html>