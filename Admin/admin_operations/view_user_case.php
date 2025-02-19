<?php
session_start();

$id = $_GET['UserID'];
require "../../Configs/db_connection.php";
require "../../Configs/functions.php";
global $conn;
$userId=$_SESSION['UserID']; 
////check authourization


// Fetch user details
$user_query = "SELECT * FROM users WHERE UserID='$id'";
$user_query_result = mysqli_query($conn, $user_query);
$user_query_row = mysqli_fetch_assoc($user_query_result);

$user_id = $user_query_row['UserID'];

// Fetch cases for the user
$cases_query = "SELECT * FROM cases WHERE UserID=$user_id";
$cases_query_result = mysqli_query($conn, $cases_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View User Cases</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/Bondi.css">
    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #90caf9);
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #1e88e5 !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #ffffff !important;
            font-size: 1.75rem;
            font-weight: bold;
        }

        .logout-btn {
            background-color: #dc3545;
            border: none;
            border-radius: 20px;
            padding: 8px 20px;
            color: white;
            font-weight: bold;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        .scrollable {
            max-height: 500px;
            overflow-y: auto;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .list-group-item {
            border: none;
            border-bottom: 1px solid #ddd;
            padding: 1rem;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        .btn-primary {
            border-radius: 20px;
            padding: 8px 20px;
        }

        .alert {
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background-color: #67a75a;
            color: white;
        }

        .alert-danger {
            background-color: #ef212b;
            color: white;
        }

        .container-fluid {
            padding: 1rem;
        }
    </style>
    <script>
        // Clear URL parameters after the page has loaded
        window.onload = function() {
            const url = new URL(window.location);
            url.search = ''; // Clear the query string
            window.history.replaceState({}, document.title, url);
        };
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light shadow">
        <div class="container-fluid">
            <span class="navbar-brand mb-0">JMS - Case Management</span>
            <a href="../logout.php" class="btn logout-btn">Logout</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Display Messages -->
                <?php
                if (!empty($_GET['message'])) {
                    $message = $_GET['message'];
                    $alertClass = (strpos($message, 'success') !== false) ? 'alert-success' : 'alert-danger';
                    echo "
                    <div class='alert $alertClass alert-dismissible fade show text-center' role='alert'>
                        <strong>$message</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                    ";
                }
                ?>

                <!-- User Cases List -->
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Cases for <?php echo $user_query_row['Name']; ?></h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="scrollable">
                            <ul class="list-group list-group-flush">
                                <?php
                                while ($row = mysqli_fetch_assoc($cases_query_result)) {
                                    echo "
                                    <li class='list-group-item'>
                                        <div class='d-flex justify-content-between align-items-center'>
                                            <div class='d-flex flex-column'>
                                                <span><strong>Case Type:</strong> {$row['Case_Status']}</span>
                                                <span><strong>Case Name:</strong> {$row['Name']}</span>
                                            </div>
                                            <a href='../../User/View_Case_Details.php?CaseID={$row['CaseID']}' class='btn btn-primary'>Details</a>
                                        </div>
                                    </li>
                                    ";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>