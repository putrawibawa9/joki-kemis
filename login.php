<?php

// Retrieve inputs from POST request
$username = $_POST['username'];
$password = $_POST['password'];


// Include database connection
include "koneksi.php";

// Validate inputs
if (empty($username) || empty($password)) {
    echo "<script>alert('Both fields are required!'); window.location = 'login.php'</script>";
    exit();
}

// Prepare and execute SQL query to find the user
$qry = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($con, $qry);


// Check if the user exists
if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);
    
    // Verify password
    if (password_verify($password, $user['password'])) {
        // Start session and store user information
        session_start();
        $_SESSION['username'] = $user['username'];
        echo "<script>alert('Login successful!'); window.location = 'latihan.php'</script>";
    } else {
        echo "<script>alert('Invalid password!'); window.location = 'index.php'</script>";
    }
} else {
    echo "<script>alert('User not found!'); window.location = 'index.php'</script>";
}
?>
