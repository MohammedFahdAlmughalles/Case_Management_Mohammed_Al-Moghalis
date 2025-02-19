<?php
require "db_connection.php";
function hasPermission($userId, $permissionName)
{
    global $conn;

    $stmt = $conn->prepare(" 
        SELECT 1  
        FROM users u 
        JOIN roles r ON u.Role = r.RoleID
        JOIN rolepermissions rp ON r.RoleID = rp.RoleID 
        JOIN permissions p ON rp.PerID = p.PerID 
        WHERE u.UserID = ? AND p.Name = ? 
    ");
    if (!$stmt) { // Check if prepare() failed
        die("SQL Error: " . $conn->error);
    }
    $stmt->bind_param("is", $userId, $permissionName);
    $stmt->execute();
    $stmt->store_result();

    return $stmt->num_rows > 0;
}


// function storesole($userID)
// {
//     global $conn;

//     $stmt = $conn->prepare("SELECT  FROM users WHERE Email = ?");
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     $stmt->bind_result($hashed_password, $UserID);
//     $stmt->fetch();
// }


function display_data(){

    global $conn;
    $query="SELECT * FROM users ORDER BY UserID DESC; ";
    $result= mysqli_query($conn,$query);
    return $result;
}


function getrolenamebyid($roleid) {
    global $conn;

    // Prepare the query
    $query = $conn->prepare("SELECT Name FROM roles WHERE RoleID = ?");
    if (!$query) {
        die("SQL Error: " . $conn->error); // Handle SQL errors
    }

    // Bind the parameter and execute the query
    $query->bind_param("i", $roleid);
    $query->execute();

    // Bind the result variable
    $query->bind_result($rolename);

    // Fetch the result
    if ($query->fetch()) {
        // Successfully fetched the role name
        $query->close(); // Close the statement
        return $rolename;
    } else {
        // No matching role found
        $query->close(); // Close the statement
        return null; // Return null or handle the error as needed
    }
}


