<?php
require "db_connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $role = $_POST['role']; 


    $allowed_roles = ["User", "clerk", "judge", "Head of court","Secretary","Admin"];
    if (!in_array($role, $allowed_roles)) {
        die("Invalid role selected.");
    }








    






    for($i=0;$i<count($allowed_roles);$i++){
        if($role==$allowed_roles[$i]){
            $role=++$i;
            break;
        }
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


 

    // Insert data into database
    $sql = "INSERT INTO users (Email, Name, Address, Phone, userpassword, Role) 
            VALUES ('$email', '$name', '$address', '$phone', '$hashed_password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign-up successful!";
        header("Location: ../User_login.php?success=Account Created Successfully"); // Redirect to login page
        exit();
    } else {
        header("Location: ../signup.php?error=Email Already Exist"); // Redirect to signup page
    }

    // Close connection
    $conn->close();
} else {
    // If accessed without form submission, redirect to signup page
    header("Location: signup.php");
    exit();
}
?>
