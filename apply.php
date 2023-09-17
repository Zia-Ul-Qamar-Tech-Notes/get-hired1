<?php

// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ziarah";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$job_skill = $_POST['job_skill'];
$description = $_POST['description'];
$resume = $_POST['resume'];

// Insert data into table
$sql = "INSERT INTO applications (name, email, job_skill, description, resume) 
        VALUES ('$name', '$email', '$job_skill', '$description', '$resume')";

if (mysqli_query($conn, $sql)) {
        header("Location: home.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);

?>
