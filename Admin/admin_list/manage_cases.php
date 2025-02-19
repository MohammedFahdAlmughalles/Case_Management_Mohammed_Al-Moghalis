<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
        <div class="admin-content">
            <div class="header-row mb-4">
                <h3>Case Management</h3>
                <div class="controls">
                    <div class="search-box">
                        <input type="text" id="caseSearch" placeholder="Search cases..." class="form-control">
                        <button class="btn btn-primary" onclick="searchCases()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCaseModal">
                            <i class="fas fa-plus-circle"></i> New Case
                        </button>
                        <button class="btn btn-info" onclick="exportCases()">
                            <i class="fas fa-file-export"></i> Export
                        </button>
                    </div>
                </div>
            </div>

            <div class="filter-row mb-3">
                <div class="filter-group">
                    <label>Status:</label>
                    <select class="form-select" id="statusFilter" onchange="filterCases()">
                        <option value="all">All Statuses</option>
                        <option value="open">Open</option>
                        <option value="in_progress">In Progress</option>
                        <option value="closed">Closed</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Priority:</label>
                    <select class="form-select" id="priorityFilter" onchange="filterCases()">
                        <option value="all">All Priorities</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                        <option value="critical">Critical</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Date Range:</label>
                    <input type="date" class="form-control" id="startDate" onchange="filterCases()">
                    <span>to</span>
                    <input type="date" class="form-control" id="endDate" onchange="filterCases()">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Case ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Category</th>
                            <th>Created Date</th>
                            <th>Assigned To</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="casesTableBody">
                        ${generateCaseRows()}
                    </tbody>
                </table>
            </div>

            <div class="case-stats mt-4">
                <div class="stats-card bg-primary">
                    <h5>Open Cases</h5>
                    <span class="count">24</span>
                </div>
                <div class="stats-card bg-warning">
                    <h5>In Progress</h5>
                    <span class="count">15</span>
                </div>
                <div class="stats-card bg-success">
                    <h5>Closed (7d)</h5>
                    <span class="count">42</span>
                </div>
            </div>
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