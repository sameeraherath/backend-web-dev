<?php 
// Database conncetion
$servername = "localhost";
$username = "root";
$password = "";
$database = "simple_form_db";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];


// Insert data into database
$sql = "INSERT INTO contacts (name, email) VALUES ('$name', '$email')";

if (mysqli_query($conn, $sql)) {
    echo "Data submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>