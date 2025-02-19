<?php

require_once "../Configs/db_connection.php";
global $conn;

$Name="";
$Leave_ID="";
$National_ID="";
$Issue_Date="";
$Admission_Date="";
$Discharge_Date="";
$Duration="";
$Physician_Name="";
$Position="";
$successmassage="";
$errormassage ="";

//////////////////////

if($_SERVER['REQUEST_METHOD']=='GET'){
    //get method

    if(!isset($_GET["CaseID"])){
        header("Location: dashboard.php");
        exit;
    }
    
    $Case_ID=$_GET["CaseID"];
    //read the row of the selected sick leave
    $sql = "SELECT * FROM medical_excuses WHERE Leave_ID= '$Leave_ID'";
    $result=$conn->query($sql);
    if (!$result) {
        // Query failed; print the error and exit
        die("Query Failed: " . $conn->error);
    }
    $row=$result->fetch_assoc();

    if(!$row){
        header("Location: dashboard.php");
        exit;    
    }
    $Name=$row["NAME"];
    $Leave_ID=$row['Leave_ID'];
    $National_ID=$row["National_ID"];
    $Issue_Date=$row["Issue_Date"];
    $Admission_Date=$row["Admission_Date"];
    $Discharge_Date=$row["Discharge_Date"];
    $Duration=$row["Duration"];
    $Physician_Name=$row["Physician_Name"];
    $Position=$row["Position"];

    


}

else{
    //POST method
    $Name=$_POST["Name"];
    $Leave_ID=$_POST['Leave_ID'];
    $National_ID=$_POST["National_ID"];
    $Issue_Date=$_POST["Issue_Date"];
    $Admission_Date=$_POST["Admission_Date"];
    $Discharge_Date=$_POST["Discharge_Date"];
    $Duration=$_POST["Duration"];
    $Physician_Name=$_POST["Physician_Name"];
    $Position=$_POST["Position"];
    do{
        if(empty($Name)||empty($Leave_ID)||empty($National_ID)||empty($Issue_Date)||empty($Admission_Date)||empty($Discharge_Date)||empty($Duration)||empty($Physician_Name)||empty($Position))
        {
            $errormassage ="All fields are required";
            break;
        }
        $sql = "UPDATE medical_excuses SET ".
        "Name='$Name', ".
        "Leave_ID='$Leave_ID', ".
        "National_ID='$National_ID', ".
        "Issue_Date='$Issue_Date', ".
        "Admission_Date='$Admission_Date', ".
        "Discharge_Date='$Discharge_Date', ".
        "Duration='$Duration', ".  // Ensure Duration is a valid variable
        "Physician_Name='$Physician_Name', ".
        "Position='$Position' ".
        "WHERE Leave_ID='$Leave_ID'";
 

        $result=$conn->query($sql);

        if(!$result){
            $errormassage="Invalid Query".$conn->error;
            break;
        }
        $successmassage="Sick Leave Updated Successfully";

        header("Location: dashboard.php");
        exit;    


    }while(false);

}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Leave ID</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container my-5">
        <h2>New Leave ID</h2>
        <?php
        if(!empty($errormassage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errormassage</strong>
            <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>

            </div>
            
            ";
        }
        
        ?>



        <form method="post">
            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Name" value="<?php echo $Name?>">
                </div>
            </div>

           

            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Leave ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Leave_ID" value="<?php echo $Leave_ID?>">
                </div>
            </div>
            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">National ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="National_ID" value="<?php echo $National_ID?>">
                </div>
            </div>



            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Issue Date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Issue_Date" value="<?php echo $Issue_Date?>">
                </div>
            </div>


            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Admission Date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Admission_Date" value="<?php echo $Admission_Date?>">
                </div>
            </div>

            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Discharge Date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Discharge_Date" value="<?php echo $Discharge_Date?>">
                </div>
            </div>

       
            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Duration</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Duration" value="<?php echo $Duration?>">
                </div>
            </div>


            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Physician Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Physician_Name" value="<?php echo $Physician_Name?>">
                </div>
            </div>



            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Position</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Position" value="<?php echo $Position?>">
                </div>
            </div>
            <?php
                if(!empty(!empty($successmassage))){
                    echo"
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
                   <a href="../Admin/dashboard.php" class="btn btn-outline-danger"role="button">Cancel</a>
                </div>
            
            </div>

          
        </form>
    </div>
</body>
</html>