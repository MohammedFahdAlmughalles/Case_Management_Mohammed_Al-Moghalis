<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../Configs/db_connection.php";
    $CaseID = $_POST['CaseID'];
    // Check if a file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "uploads/"; // Change this to the desired directory for uploaded files
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is allowed (you can modify this to allow specific file types)
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf","docx","php");
        if (!in_array($file_type, $allowed_types)) {
            header("location: index.php?message=Sorry, only JPG, JPEG, PNG, GIF, docx,and PDF files are allowed.");
        } else {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // File upload success, now store information in the database
                $filename = $_FILES["file"]["name"];
                $filesize = $_FILES["file"]["size"];
                $filetype = $_FILES["file"]["type"];



                // Insert the file information into the database
                $sql = "INSERT INTO document (DocumentName, DocumentSize, DocumentType,CaseID) VALUES ('$filename', $filesize, '$filetype','$CaseID ')";

                if ($conn->query($sql) === TRUE) {

                    header("location: ../User/User_profile.php?massage=The file " . basename($_FILES["file"]["name"]) . " has been uploaded and the information has been stored in the database.");
                    
                } else {
                    header("location: index.php?message=Sorry, there was an error uploading your file and storing information in the database: ");

                }

                $conn->close();
            } else {
                header("location: index.php?message=Sorry, there was an error uploading your file.");
            }
        }
    } else {
        header("location: index.php?message=No file was uploaded.");
     
    }
}
?>

