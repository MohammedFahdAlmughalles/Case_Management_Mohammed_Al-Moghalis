<?php
session_start();
require "../Configs/db_connection.php";
global $conn;
$UserID = $_SESSION['UserID'];
$Name = "";
$Status = "";
$Description = "";



//////////////////////
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST["Name"];
    $Status = $_POST["Status"];
    $Description = $_POST["Description"];
    ////////////////////

}
/////////////file uploading process///////////////////

///////////////////

do {
    if (empty($Name) || empty($Status) || empty($Description)) {
        $errormassage = "All fields are required";
        break;
    }







    //add a new sick leave
    $sql = "INSERT INTO  cases(Name,Case_Status,Description,UserID) " . "VALUES('$Name','$Status','$Description','$UserID')";
    $result = $conn->query($sql);
    if (!$result) {
        $errormassage = "Invalid Query" . $conn->error;
        break;
    }
    $Name = "";
    $Status = "";
    $Description = "";
    $successmassage = "New Sick Leave Added Successfully";
    header("Location: User_profile.php?status=Add_succes");
    exit;
} while (false);

?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open a New Case</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css.map">
    <link rel="stylesheet" href="../css/Bondi.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
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
        <div class="container-fluid">
            <span class="navbar-brand mb-0">JMS - Case Management</span>

        </div>
    </nav>
    <div class="container my-5">
        <h2>Open a New Case</h2>
        <?php
        if (!empty($errormassage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errormassage</strong>
            <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>

            </div>
            
            ";
        }

        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Case Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Name" value="<?php echo $Name ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="role" class="col-sm-3 col-form-label">Case status</label>
                <div class="col-sm-6">
                    <select id="role" class="form-control" name="Status" value="<?php echo $Status ?>">
                        <option value="Status" disabled selected>Status</option>
                        <option value="Civil">Civil</option>
                        <option value="Personal">Personal</option>
                        <option value="Financial">Financial</option>
                        <option value="Electronic">Electronic</option>
                        <option value="Family">Family</option>
                        <option value="Intellectual Property">Intellectual Property</option>
                        <option value="Commercial">Commercial</option>
                        <option value="Criminal">Criminal</option>

                    </select>
                </div>

            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Case Description</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="Description" value="<?php echo $Name ?>" rows="5"></textarea>
                </div>
            </div>


            <!-- <div class="container mt-5">
                <h2>Upload Case Document</h2> -->
                <!-- File Input Field -->

                <!-- <div class="row mb-3">
                    <label for="file" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" name="file" id="file">
                    </div>
                </div>


            </div> -->
            <?php
            if (!empty(!empty($successmassage))) {
                echo "
                        <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successmassage</strong>
                            <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                        </div>
                        </div>";
            }

            ?>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <div class=" col-sm-3 d-grid">
                    <a href="User_profile.php" class="btn btn-danger" role="button">Cancel</a>
                </div>

            </div>


        </form>
    </div>
</body>

</html>