<?php

// Retrieve inputs from POST request
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

var_dump($username, $email, $password);
// Include database connection
include "koneksi.php";

// Validate inputs (you can add more validations as needed)
if (empty($username) || empty($email) || empty($password)) {
    echo "<script>alert('All fields are required!'); window.location = 'index.php'</script>";
    exit();
}

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Prepare and execute SQL query to insert user data
$qry = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
$exec = mysqli_query($con, $qry);

if ($exec) {
    echo "<script>alert('Registration successful!'); window.location = 'index.php'</script>";
} else {
    echo "<script>alert('Registration failed!'); window.location = 'index.php'</script>";
}
?>
