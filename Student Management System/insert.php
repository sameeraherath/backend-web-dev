<?php
include('db.php');

if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $age =  $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO students (name, age, gender, email, phone, address) VALUES ('$name','$age','$gender','$email','$phone','$address')"; 


    if($conn->query($sql) === TRUE ) {

        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close(); 
}

?>