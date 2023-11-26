<?php
// Include your database connection file (e.g., conn.php)
include 'conn.php';

// Get admin password from the form
$password = '1234'; // Replace 'admin_password' with the actual password from your form

// Hash the password using password_hash
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert the hashed password into the database
$sql = "INSERT INTO admin_info (admin_username, admin_password) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// Replace 'admin_username' with the actual admin username from your form
$username = 'agnes'; // Replace 'admin_username' with the actual username from your form

mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);
mysqli_stmt_execute($stmt);

if(mysqli_affected_rows($conn) > 0) {
    echo "Admin password hashed and inserted into the database successfully.";
} else {
    echo "Error hashing or inserting the admin password.";
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
