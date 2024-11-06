<?php
$connection = new mysqli("localhost", "root", "", "studentmanagementsystem");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $enrollment_date = $_POST['enrollment_date'];

    $sql = "INSERT INTO students (first_name, last_name, email, phone, course, enrollment_date) 
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$course', '$enrollment_date')";
    if ($connection->query($sql) === TRUE) {
        header("Location: students.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>
