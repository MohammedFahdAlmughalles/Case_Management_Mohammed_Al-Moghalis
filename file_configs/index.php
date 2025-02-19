<?php
session_start();
$userId=$_SESSION['UserID'];
require "../Configs/functions.php";
if (!isset($_SESSION['Email'])||!isset($_SESSION['UserID'])) {
    header("Location: ../User_login.php?error=Please login first");
    exit;
}else if (!hasPermission($userId, 'Submit Case File')) { 
    die("Access Denied: You cannot upload files."); 
    } 


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>File Upload and Download</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap Icons -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
	<style>
		/* Custom Styles */
		.navbar {
			background-color: #1e88e5 !important;
		}

		.navbar-brand {
			color: #ffffff !important;
			font-size: 1.75rem;
			font-weight: bold;
		}

		.form-container {
			background-color: #ffffff;
			padding: 2rem;
			border-radius: 10px;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}

		.form-label {
			font-weight: 500;
		}

		.btn-primary {
			background-color: #1e88e5;
			border: none;
			padding: 10px 20px;
			font-size: 1rem;
		}

		.btn-primary:hover {
			background-color: #1565c0;
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
		</div>
	</nav>

	<!-- Main Content -->
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="form-container">
					<h2 class="text-center mb-4">Upload a File</h2>
					<form action="upload.php" method="POST" enctype="multipart/form-data">
						<?php if (isset($_GET['message'])): ?>
							<div class="alert alert-danger text-center p-2 rounded-3">❌ <?php echo $_GET['message'] ?></div>
						<?php endif ?>
						<!-- Case Name Field -->
						<div class="row mb-4">
							<label class="col-sm-3 col-form-label form-label">Case ID</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="CaseID" placeholder="Enter Case ID" required>
							</div>
						</div>

						<!-- File Upload Field -->
						<div class="row mb-4">
							<label class="col-sm-3 col-form-label form-label">Select File</label>
							<div class="col-sm-9">
								<input type="file" class="form-control" name="file" id="file">
							</div>
						</div>

						<!-- Submit Button -->
						<div class="row mb-3">
							<div class="col-sm-9 offset-sm-3">
								<button type="submit" class="btn btn-primary w-100">
									<i class="bi bi-upload me-2"></i>Upload File
								</button>
							</div>
						</div>
						<!-- Camcel Button -->
						<div class="row mb-3">
							<div class="col-sm-9 offset-sm-3">
							<a href="../User/User_profile.php" class="btn btn-danger w-100" role="button">Cancel</a>

							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>