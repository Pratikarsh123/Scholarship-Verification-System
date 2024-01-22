<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'scholarship_registration');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the charset to utf8mb4 to support a wider range of characters
$conn->set_charset("utf8mb4");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $userID = $_POST['userID'];
    $password = $_POST['Password'];

    // Validate student credentials
    $sql = "SELECT * FROM students WHERE userID = '$userID' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if there is a match
    if ($result->num_rows > 0) {
        // Student login successful, set session variables if needed
        session_start();
        $_SESSION['userID'] = $userID;

        // Redirect to view_details.php with the user ID
        echo "Success.";
        header("Location: view_details_stud.php");
        exit();
    } else {
        // Invalid user ID or password
        echo "Invalid user ID or password. Please try again.";
    }
}

// Close the database connection
$conn->close();
?>
