<?php
// process_application.php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'scholarship_registration');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user ID from the form
    $id = $_POST['id'];

    // Check which button was clicked
    if (isset($_POST['approve'])) {
        // Update status to 'Approved' in the database
        $sql = "UPDATE students SET status = 'Approved' WHERE id = $id";
        $conn->query($sql);
    } elseif (isset($_POST['decline'])) {
        // Update status to 'Declined' in the database
        $sql = "UPDATE students SET status = 'Declined' WHERE id = $id";
        $conn->query($sql);
    }

    // Redirect back to the admin dashboard
    header("Location: admin.php");
}

// Close the database connection
$conn->close();
?>
