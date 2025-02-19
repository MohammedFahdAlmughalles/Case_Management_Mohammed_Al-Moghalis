<?php
require "../../Configs/functions.php";

$result = display_data()



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../../css/admin.css">
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


            <div class="d-flex justify-content-center flex-grow-1">
                <?php
                if (!empty($_GET['success'])) {
                    $message = $_GET['success'];
                    echo "
                <div class='alert alert-success alert-dismissible fade show text-center' role='alert' style='background-color:rgb(67, 167, 90); color: white;'>
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
        <div class="admin-content">
            <div class="header-row mb-4">
                <h3>User Management</h3>
                <div class="controls">
                    <div class="search-box">
                        <input type="text" id="userSearch" placeholder="Search users..." class="form-control">
                        <button class="btn btn-primary" onclick="searchUsers()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <a class="btn btn-success" href="../admin_operations/add_new_user.php">
                        <i class="fas fa-user-plus"></i>
                        Add New User
                    </a>
                </div>
            </div>



            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>created_at</th>
                            <th>Last Login</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        <tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $rolename = getrolenamebyid($row['Role'])
                            ?>
                                <td><?php echo $row['UserID'] ?></td>
                                <td><?php echo $row['Name'] ?></td>
                                <td><?php echo $row['Email'] ?></td>
                                <td><?php echo $rolename ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td><?php echo $row['LastLogin'] ?></td>
                                <td>
                                <?php if($row['Role']==1){?>

                                    <div class="btn-group">
                                    <a href="../admin_operations/view_user_case.php?UserID=<?php echo $row['UserID']?>" class="btn btn-secondary" style="color: white;">view user cases</a>                                       
                                    </div>
                                    <?php } ?>

                                </td>

                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <nav aria-label="User pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <script>
            function loadContent(type) {
                switch (type) {
                    case 'users':
                        window.location.href = 'manage_users.php';
                        break;
                    case 'cases':
                        window.location.href = 'manage_cases.php';
                        break;
                    case 'logs':
                        window.location.href = 'system_logs.php';
                        break;
                    case 'settings':
                        window.location.href = 'future_settings.php';
                        break;
                    default:
                        window.location.href = '404.html'; // Redirect to a 404 or error page if the value doesn't match any case
                }
            }
        </script>



</body>

</html>