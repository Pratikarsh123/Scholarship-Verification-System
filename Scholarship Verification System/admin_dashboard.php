<?php
// admin_dashboard.php

// Start the session to access session variables
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['adminID'])) {
    header("Location: admin_login.php"); // Redirect to admin login if not logged in
    exit();
}

// Include database connection code
include 'db_connection.php';

// Fetch pending approval requests from the database
$sql = "SELECT * FROM students WHERE status = 'Pending'";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here (CSS links, title, etc.) -->
</head>
<body>
    <!-- Your admin dashboard content here -->
    <h1>Welcome, <?php echo $_SESSION['adminID']; ?>!</h1>

    <h2>Pending Approval Requests</h2>
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>Student Name</th>
            <!-- Add more columns as needed -->
        </tr>
        <?php
        // Display pending approval requests
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['userID'] . "</td>";
            echo "<td>" . $row['studentName'] . "</td>";
            // Add more columns as needed
            echo "</tr>";
        }
        ?>
    </table>

    <a href="admin_logout.php">Logout</a> <!-- Add a logout link -->

    <!-- Add your footer content here -->
</body>
</html>
