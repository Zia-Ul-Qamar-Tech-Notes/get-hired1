<?php
// Retrieve user data from the HTML form
$email = $_POST['email'];
$password = $_POST['password'];

// Connect to MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'ziarah');

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user data from the 'users' table
$query = "SELECT * FROM registration WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query);

// Check if user exists
if (mysqli_num_rows($result) > 0) {
    // User exists, allow access
    header("Location: home.html");
} else {
    // User does not exist or password is incorrect, deny access
    echo "<h1>Login failed</h1>";
}

// Close database connection
mysqli_close($conn);
?>
