<?php
session_start();


include "../Configs/db_connection.php";
global $conn;


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: User_login.php?error=no_match");
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];


if (empty($email) || empty($password)) {

    header("Location: ../User_login.php?error=empty_data");
    exit;
}
////////////////////////////////////
$stmt = $conn->prepare("SELECT userpassword, UserID, Role FROM users WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($hashed_password, $UserID, $role);
$stmt->fetch();
$stmt->close(); // Close statement

if ($hashed_password && password_verify($password, $hashed_password)) {
    session_regenerate_id(true);
    $_SESSION['Email'] = $email;
    $_SESSION['UserID'] = $UserID;
    $_SESSION['RoleID'] = $role;

    // Securely update last login
    $lastlogin_stmt = $conn->prepare("UPDATE users SET LastLogin = NOW() WHERE UserID = ?");
    $lastlogin_stmt->bind_param("i", $UserID);
    $lastlogin_stmt->execute();
    $lastlogin_stmt->close(); // Close statement

    if ($role == 6) {
        header("Location: ../Admin/Admin_profile.php");
        exit;
    } else {
        header("Location: ../User/User_profile.php");
        exit;
    }
} 
 else {
    header("Location: ../User_login.php?error=Wrong Password or Email");
    exit;
}
////////////////////////////////////
