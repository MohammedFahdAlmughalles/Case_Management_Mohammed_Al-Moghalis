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
                <h3>System Configuration Center</h3>
                <div class="controls">
                    <div class="search-box">
                        <input type="text" placeholder="Search settings..." class="form-control">
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-secondary" disabled>
                            <i class="fas fa-save"></i> Save All
                        </button>
                    </div>
                </div>
            </div>

            <div class="settings-grid">
                <!-- System Configuration Card -->
                <div class="settings-card">
                    <div class="card-header">
                        <i class="fas fa-cogs"></i>
                        <h5>Core System Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="setting-item">
                            <label>System Maintenance Mode</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </div>
                        <div class="setting-item">
                            <label>Data Retention Policy</label>
                            <select class="form-select">
                                <option>1 Year</option>
                                <option>2 Years</option>
                                <option>5 Years</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Module Management Card -->
                <div class="settings-card">
                    <div class="card-header">
                        <i class="fas fa-cube"></i>
                        <h5>Feature Modules</h5>
                    </div>
                    <div class="card-body">
                        <div class="module-list">
                            <div class="module-item">
                                <div class="module-info">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Advanced Security Module</span>
                                    <span class="badge bg-success">Active</span>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary" disabled>
                                    Configure
                                </button>
                            </div>
                            <div class="module-item coming-soon">
                                <div class="module-info">
                                    <i class="fas fa-robot"></i>
                                    <span>AI Analytics Engine</span>
                                    <span class="badge bg-warning">Preview</span>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary" disabled>
                                    Enable
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- API Management Card -->
                <div class="settings-card">
                    <div class="card-header">
                        <i class="fas fa-code"></i>
                        <h5>API Configuration</h5>
                    </div>
                    <div class="card-body">
                        <div class="setting-item">
                            <label>API Rate Limiting</label>
                            <div class="range-container">
                                <input type="range" class="form-range" min="0" max="1000" step="50">
                                <span class="range-value">500 requests/min</span>
                            </div>
                        </div>
                        <div class="setting-item">
                            <label>Webhook Endpoints</label>
                            <div class="endpoint-list">
                                <div class="endpoint-item">
                                    <code>/api/v1/webhooks</code>
                                    <div class="status-indicator active"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customization Card -->
                <div class="settings-card">
                    <div class="card-header">
                        <i class="fas fa-palette"></i>
                        <h5>UI Customization</h5>
                    </div>
                    <div class="card-body">
                        <div class="theme-selector">
                            <div class="theme-option" style="background: #2c3e50"></div>
                            <div class="theme-option" style="background: #34495e"></div>
                            <div class="theme-option" style="background: #16a085"></div>
                        </div>
                        <button class="btn btn-sm btn-outline-primary" disabled>
                            Custom CSS Editor
                        </button>
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