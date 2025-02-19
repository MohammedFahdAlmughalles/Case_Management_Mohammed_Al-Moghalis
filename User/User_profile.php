<?php
session_start();
if (!isset($_SESSION['Email'])) {
    header("Location: ../User_login.php?error=Please login first");
    exit;
}

require "../Configs/db_connection.php";
global $conn;

$email = $_SESSION['Email'];
$user_query = "SELECT * FROM users WHERE Email='$email'";
$user_query_result = mysqli_query($conn, $user_query);
$user_query_row = mysqli_fetch_assoc($user_query_result);

$user_name = $user_query_row['Name'];
$user_address = $user_query_row['Address'];
$user_email = $user_query_row['Email'];
$user_id = $user_query_row['UserID'];

$cases_query = "SELECT * FROM cases WHERE UserID=$user_id";
$cases_query_result = mysqli_query($conn, $cases_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user_name?> Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css.map">
    <link rel="stylesheet" href="../css/Bondi.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #90caf9);
        }

        .scrollable {
            height: 400px;
            overflow-y: auto;
        }

        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .list-group-item {
            border: none;
            border-bottom: 1px solid #ddd;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

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

        .logout-btn {
            background-color: #dc3545;
            /* Red color for logout button */
            border: none;
            border-radius: 20px;
            padding: 8px 20px;
            color: white;
            font-weight: bold;
        }

        .logout-btn:hover {
            background-color: #c82333;
            /* Darker red on hover */
            color: white;
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
    <nav class="navbar navbar-light shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Navbar Brand -->
            <span class="navbar-brand mb-0">JMS - Case Management</span>

            <!-- Centered Message -->
            <div class="d-flex justify-content-center flex-grow-1">
                <?php
                if (!empty($_GET['massage'])) {
                    $message = $_GET['message'];
                    echo "
                <div class='alert alert-success alert-dismissible fade show text-center' role='alert' style='background-color:rgb(67, 167, 90); color: white;'>
                    <strong> $message</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
                }
                ?>
            </div>

            <div class="d-flex justify-content-center flex-grow-1">
                <?php
                if (!empty($_GET['message'])) {
                    $message = $_GET['message'];
                    echo "
                <div class='alert alert-success alert-dismissible fade show text-center' role='alert' style='background-color:rgb(239, 33, 43); color: white;'>
                    <strong> $message</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
                }
                ?>
            </div>

            <!-- Logout Button -->
            <div>
                <a href="../logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <!-- Add Button on the Left -->
            <div class="col-12 mb-3">
                <a href="open_new_case.php" class="btn btn-primary" style="color: white;">Open New Case</a>

            </div>
        </div>
        <div class="row">
            <!-- First Column -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong>Name:</strong> <?php echo $user_name ?>
                        </h5>
                        <p>
                            <strong>Address:</strong> <?php echo $user_address ?>
                        </p>
                        <p>
                            <strong>Email:</strong><?php echo $user_email ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Second and Third Columns Merged -->
            <div class="col-md-8">
                <div class="scrollable border p-2 bg-white rounded">
                    <ul class="list-group">
                        <ul class="list-group">
                            <?php
                            while ($row = mysqli_fetch_assoc($cases_query_result)) {
                            ?>
                                <li class="list-group-item" style="border-bottom: 1px solidrgb(42, 105, 167);">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Case Type and Name -->
                                        <div class="d-flex flex-column">
                                            <span><strong>Case Type:</strong> <?php echo $row['Case_Status']; ?></span>
                                            <span><strong>Case Name:</strong> <?php echo $row['Name']; ?></span>
                                        </div>
                                        <!-- Details Button -->
                                        <a href="View_Case_Details.php?CaseID=<?php echo $row['CaseID']; ?>" class="btn btn-primary">Details</a>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>