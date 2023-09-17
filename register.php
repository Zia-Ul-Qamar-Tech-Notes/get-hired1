<?php
// Retrieve user data from the HTML form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password
// $password = password_hash($password, PASSWORD_DEFAULT);

// Connect to MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'ziarah');

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert user data into the 'users' table
$query = "INSERT INTO registration (fname, lname, email, password, address, age) 
          VALUES ('$fname', '$lname', '$email', '$password', '$address', '$age')";

if (mysqli_query($conn, $query)) {
    // Display success message
    header("Location: index.html");
} else {
    // Display error message
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
