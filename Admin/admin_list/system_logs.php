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
                <h3>System Audit Logs</h3>
                <div class="controls">
                    <div class="search-box">
                        <input type="text" id="logSearch" placeholder="Search logs..." class="form-control">
                        <button class="btn btn-primary" onclick="searchLogs()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-danger" onclick="purgeOldLogs()">
                            <i class="fas fa-trash"></i> Purge Old Logs
                        </button>
                        <button class="btn btn-success" onclick="exportLogs()">
                            <i class="fas fa-file-export"></i> Export
                        </button>
                        <button class="btn btn-info" onclick="refreshLogs()">
                            <i class="fas fa-sync"></i> Refresh
                        </button>
                    </div>
                </div>
            </div>

            <div class="filter-row mb-3">
                <div class="filter-group">
                    <label>Log Level:</label>
                    <select class="form-select" id="logLevelFilter" onchange="filterLogs()">
                        <option value="all">All Levels</option>
                        <option value="info">Info</option>
                        <option value="warning">Warning</option>
                        <option value="error">Error</option>
                        <option value="critical">Critical</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Date Range:</label>
                    <input type="datetime-local" class="form-control" id="logStartDate">
                    <span>to</span>
                    <input type="datetime-local" class="form-control" id="logEndDate">
                </div>
                <div class="filter-group">
                    <label>User Type:</label>
                    <select class="form-select" id="userTypeFilter" onchange="filterLogs()">
                        <option value="all">All Users</option>
                        <option value="admin">Admins</option>
                        <option value="user">Regular Users</option>
                        <option value="system">System</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-sm table-hover table-logs">
                    <thead class="table-dark">
                        <tr>
                            <th>Timestamp</th>
                            <th>Event Type</th>
                            <th>User</th>
                            <th>IP Address</th>
                            <th>Action</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody id="logsTableBody">
                        ${generateLogRows()}
                    </tbody>
                </table>
            </div>

            <div class="log-stats mt-4">
                <div class="stat-card bg-info">
                    <h5>Total Logs</h5>
                    <span class="count">1,234</span>
                </div>
                <div class="stat-card bg-danger">
                    <h5>Critical Errors</h5>
                    <span class="count">23</span>
                </div>
                <div class="stat-card bg-warning">
                    <h5>Security Events</h5>
                    <span class="count">45</span>
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