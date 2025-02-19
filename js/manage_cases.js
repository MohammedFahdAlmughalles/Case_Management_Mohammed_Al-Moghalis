function loadContent(type) {
    const buttons = document.querySelectorAll('.nav-button');
    buttons.forEach(btn => btn.classList.remove('active-nav'));
    event.target.classList.add('active-nav');

    if (type === 'users') {
        document.getElementById('content-display').innerHTML = `
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
                
                   <a class="btn btn-success" href="../Admin/admin_operations/add_new_user.php">
                   <i class="fas fa-user-plus"></i>
                   Add New User
                   </a>
               </div>
           </div>

           <div class="filter-row mb-3">
               <div class="filter-group">
                   <label>Filter by Role:</label>
                   <select class="form-select" id="roleFilter" onchange="filterUsers()">
                       <option value="all">All Roles</option>
                       <option value="admin">Admin</option>
                       <option value="user">Regular User</option>
                       <option value="moderator">Moderator</option>
                   </select>
               </div>
               <div class="filter-group">
                   <label>Account Status:</label>
                   <select class="form-select" id="statusFilter" onchange="filterUsers()">
                       <option value="all">All Statuses</option>
                       <option value="active">Active</option>
                       <option value="suspended">Suspended</option>
                       <option value="pending">Pending</option>
                   </select>
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
                           <th>Status</th>
                           <th>Last Login</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tbody id="usersTableBody">
                       ${generateUsersRows()}
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

       


   `;
    } else if (type === 'cases') {
        document.getElementById('content-display').innerHTML = `
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

 
        `;
    } else if (type === 'logs') {
        document.getElementById('content-display').innerHTML = `
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


        `;
    } else if (type === 'settings') {
        document.getElementById('content-display').innerHTML = `
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

         
    `;
    }
    initializeSettings();
    initializeLogTable();
    initializeCaseTable();
    initializeUsersTable();
}























function generateUsersRows() {
    // This should be replaced with actual data from your database
    return `
   <tr>
       <td>1</td>
       <td>John Doe</td>
       <td>john@example.com</td>
       <td><span class="badge bg-primary">Admin</span></td>
       <td><span class="badge bg-success">Active</span></td>
       <td>2023-07-20 14:30</td>
       <td>
           <button class="btn btn-sm btn-warning" onclick="editUser(1)">
               <i class="fas fa-edit"></i>
           </button>
           <button class="btn btn-sm btn-danger" onclick="confirmDelete(1)">
               <i class="fas fa-trash"></i>
           </button>
       </td>
   </tr>
   
`;
}

function initializeUsersTable() {
    // Initialize sorting and event listeners
    new DataTable('#usersTable', {
        paging: true,
        pageLength: 10,
        responsive: true
    });
}

function searchUsers() {
    // Implement search functionality
}

function filterUsers() {
    // Implement filtering
}

//manage cases functions 


function generateCaseRows() {
    // Replace with actual data from database
    return `
        <tr>
            <td>#CASE-1254</td>
            <td>Network Security Breach</td>
            <td><span class="badge bg-success">Open</span></td>
            <td><span class="badge bg-danger">High</span></td>
            <td>Security</td>
            <td>2023-07-15</td>
            <td>
                <div class="avatar-group">
                    <div class="avatar">JD</div>
                    <div class="avatar">AS</div>
                </div>
            </td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary" onclick="viewCaseDetails(1254)">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-warning" onclick="editCase(1254)">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" onclick="archiveCase(1254)">
                        <i class="fas fa-archive"></i>
                    </button>
                </div>
            </td>
        </tr>
    `;
}

function initializeCaseTable() {
    // Initialize case table functionality
}

function filterCases() {
    // Implement filtering logic
}

function searchCases() {
    // Implement search functionality
}

//manage logs functions


function generateLogRows() {
    // Replace with actual log data
    return `
        <tr class="log-entry log-error">
            <td>2023-07-20 14:22:15</td>
            <td><span class="badge bg-danger">ERROR</span></td>
            <td>Admin-12 (system)</td>
            <td>192.168.1.45</td>
            <td>User deletion attempt</td>
            <td><span class="status-code">403</span></td>
            <td>
                <button class="btn btn-sm btn-info" onclick="viewLogDetails(1)">
                    <i class="fas fa-info-circle"></i>
                </button>
            </td>
        </tr>
    `;
}

function initializeLogTable() {
    // Initialize log table functionality
}

function viewLogDetails(logId) {
    // Fetch log details from server
    fetch(`/api/logs/${logId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('logTimestamp').textContent = data.timestamp;
            document.getElementById('logUserAgent').textContent = data.user_agent;
            document.getElementById('logSessionId').textContent = data.session_id;
            document.getElementById('logHttpMethod').textContent = data.method;
            document.getElementById('logEndpoint').textContent = data.endpoint;
            document.getElementById('logResponse').textContent = data.response_code;
            document.getElementById('logFullDetails').textContent = JSON.stringify(data.metadata, null, 2);
            new bootstrap.Modal(document.getElementById('logDetailModal')).show();
        });
}

function filterLogs() {
    // Implement filtering logic
}

function searchLogs() {
    // Implement search functionality
}

//future settings functions
function initializeSettings() {
    // Initialize interactive components
    document.querySelectorAll('.form-range').forEach(range => {
        range.addEventListener('input', e => {
            e.target.nextElementSibling.textContent =
                `${e.target.value} requests/min`;
        });
    });
}