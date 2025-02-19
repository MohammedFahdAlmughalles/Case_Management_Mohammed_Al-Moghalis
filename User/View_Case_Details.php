<?php
session_start();
require "../Configs/db_connection.php";
require "../Configs/functions.php";
global $conn;

$userId = $_SESSION['UserID']; 
if (!hasPermission($userId, 'View Case Details')) { 
    header("Location: ../Configs/unatho.php");
} 

// Fetch case details based on the CaseID from the URL
$case_id = $_GET['CaseID'];
$case_query = "SELECT * FROM cases WHERE CaseID = $case_id";
$case_result = mysqli_query($conn, $case_query);
$case_row = mysqli_fetch_assoc($case_result);

// Fetch user details (if needed)
$user_id = $case_row['UserID'];
$user_query = "SELECT * FROM users WHERE UserID = $user_id";
$user_result = mysqli_query($conn, $user_query);
$user_row = mysqli_fetch_assoc($user_result);

// Fetch Judge Name
$judge_condition = false;
$judge_id = $case_row['AssignedJudgeID'];
$judge_query = "SELECT * FROM users WHERE UserID = $judge_id";
$judge_result = mysqli_query($conn, $judge_query);
if ($judge_result) {
    $judge_condition = true;
    $judge_row = mysqli_fetch_assoc($judge_result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #90caf9);
        }

        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .navbar {
            background-color: #1e88e5 !important;
        }

        .navbar-brand {
            color: #ffffff !important;
            font-size: 1.75rem;
            font-weight: bold;
        }


        .case-details .card-header {
            background-color: #1e88e5;
            color: white;
            font-weight: bold;
        }

        .case-details .card-body p {
            margin-bottom: 10px;
        }

        .case-details .card-body p strong {
            display: inline-block;
            width: 150px;
        }

        .modification-request {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light shadow">
        <div class="container-fluid">
            <span class="navbar-brand mb-0">JMS - Case Management</span>
            <a href="../logout.php" class="btn btn-danger">Logout</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card case-details">
                    <div class="card-header  justify-content-between align-items-center">
                        Case Details
                        <?php if ($case_row['withdraw_ability'] == 3) { ?>
                            <p>You already have withdrawn this case </p>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <!-- Case Details -->
                        <p><strong>Case ID:</strong> <?php echo $case_row['CaseID']; ?></p>
                        <p><strong>Case State:</strong> <?php echo $case_row['CaseState']; ?></p>
                        <p><strong>Case Status:</strong> <?php echo $case_row['Case_Status']; ?></p>
                        <p><strong>Case Name:</strong> <?php echo $case_row['Name']; ?></p>
                        <p><strong>Description:</strong> <?php echo $case_row['Description']; ?></p>
                        <p><strong>Created On:</strong> <?php echo $case_row['created_at']; ?></p>
                        <p>
                            <strong>Judge Name:</strong>
                            <?php if ($judge_condition == false) { ?>
                                The Court has not assigned a judge to this case yet.
                            <?php } else {
                                echo $judge_row['Name'];
                            } ?>
                        </p>

                        <!-- Judge Verdict -->
                        <?php if ($case_row['verdict'] == NULL) { ?>
                            <p><strong>Judge Verdict:</strong> The Court has not made a verdict on this case yet.</p>
                        <?php } else { ?>
                            <p><strong>Judge Verdict:</strong> <?php echo $case_row['verdict']; ?></p>
                        <?php } ?>

                        <!-- Modification Request Section -->
                        <?php if ($case_row['Modi_Req'] !== NULL) { ?>
                            <div class="modification-request d-flex align-items-center">
                                <p class="mb-0"><strong>Modification Request:</strong> <?php echo $case_row['Modi_Req']; ?>, Please click on the edit button to make your modification</p>
                            </div>
                        <?php } ?>


                        <!-- User Details -->
                        <hr>
                        <h5>User Information</h5>
                        <p><strong>User Name:</strong> <?php echo $user_row['Name']; ?></p>
                        <p><strong>User Email:</strong> <?php echo $user_row['Email']; ?></p>
                        <p><strong>User Address:</strong> <?php echo $user_row['Address']; ?></p>
                    </div>
                </div>

                <!-- Back to Profile Button -->
                <div class="text-center mt-4">
                    <a href="user_profile.php" class="btn btn-primary">Back to Profile</a>
                    <?php if ($case_row['Modi_Req'] !== NULL) { ?>
                        <a href="../file_configs/index.php?$case_id" class="btn btn-primary" style="color: white;margin:0 0 0 20px">Upload Case File</a>

                    <?php } ?>
                    <?php if ($case_row['withdraw_ability'] == 1) { ?>
                        <a href="../file_configs/index.php?$case_id" class="btn btn-danger" style="color: white;margin:0 0 0 20px">Withdraw from Case</a>

                    <?php } ?>
                </div>


            </div>
        </div>
    </div>

    <!-- JavaScript for File Upload -->
    <script>
        document.getElementById('file-upload').addEventListener('change', function() {
            var fileName = this.files[0] ? this.files[0].name : "No file chosen";
            document.getElementById('file-name').textContent = fileName;
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>