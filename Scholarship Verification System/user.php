

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
    $adminID = $_POST['adminID'];
    $adminPassword = $_POST['adminPassword'];

    // Validate admin credentials
    $sql = "SELECT * FROM admin WHERE admin_id = '$adminID' AND password = '$adminPassword'";
    $result = $conn->query($sql);

    // Check if there is a match
    if ($result->num_rows > 0) {
        // Admin login successful, set session variables
        session_start();
        $_SESSION['adminID'] = $adminID;

        // Redirect to c2.php
        header("Location: admin.php");
        exit();
    } else {
        // Invalid admin ID or password
        echo "Invalid admin ID or password. Please try again.";
    }
}

// Close the database connection
$conn->close();
?>
