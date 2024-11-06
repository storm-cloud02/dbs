<?php
$connection = new mysqli("localhost", "root", "", "studentmanagementsystem");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM students";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Student Information</title>
</head>
<body>
    <h1>Student Information</h1>
    <a href="add_student.html">Add New Student</a>
    <table>
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Course</th>
            <th>Enrollment Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['student_id']}</td>
                        <td>{$row['first_name']}</td>
                        <td>{$row['last_name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['course']}</td>
                        <td>{$row['enrollment_date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No students found.</td></tr>";
        }
        $connection->close();
        ?>
    </table>
</body>
</html>
