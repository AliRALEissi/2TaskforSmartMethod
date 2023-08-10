<?php
// Define database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robot"; // database name
// database table name is robot_retrev

// Create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare and execute SQL statement for backward movement
$stmt = $conn->prepare("INSERT INTO robot_retrev (direction) VALUES (?)");
$stmt->bind_param("s", $direction);
$direction = "B";
$stmt->execute();

// Check if row was inserted successfully
if ($stmt->affected_rows > 0) {
    echo "Backward movement recorded successfully";
} else {
    echo "Error recording backward movement: " . $stmt->error;
}

// Close statement
$stmt->close();

// Close database connection
mysqli_close($conn);
?>