<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userID'])) {
    // Redirect to the login page if not logged in
    header("Location: dash.html");
    exit();
}

// Get the user ID from the session
$userID = $_SESSION['userID'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'scholarship_registration');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the charset to utf8mb4 to support a wider range of characters
$conn->set_charset("utf8mb4");

// Fetch student data based on the user ID
$sql = "SELECT * FROM students WHERE userID = '$userID'";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    // Output data in a table
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Student Details</title>
        <!-- Bootstrap CSS -->
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css'>
        <!-- Custom CSS -->
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <div class='container mt-4'>
            <h2 class='mb-4'>Student Details</h2>
            <div class='row'>
                <div class='col-md-6'>";

    while ($row = $result->fetch_assoc()) {
        echo "<b><p><strong>STATUS:</strong> {$row['status']}</p></b>
        <p><strong>Scholarship ID:</strong> {$row['id']}</p>
              <p><strong>User ID:</strong> {$row['userID']}</p>
              <p><strong>Name:</strong> {$row['studentName']}</p>
              <p><strong>State of Origin:</strong> {$row['stateOfOrigin']}</p>
              <p><strong>Email:</strong> {$row['contactEmail']}</p>
              <p><strong>Phone:</strong> {$row['contactPhone']}</p>
              <p><strong>Aadhar Number:</strong> {$row['aadharNumber']}</p>
              <p><strong>Income Certificate Number:</strong> {$row['incomeCertificateNumber']}</p>
              <p><strong>Residential Certificate Number:</strong> {$row['residentialCertificateNumber']}</p>
              <p><strong>College Name:</strong> {$row['collegeName']}</p>
              <p><strong>College Location:</strong> {$row['collegeLocation']}</p>
              <p><strong>College Type:</strong> {$row['collegeType']}</p>
              <p><strong>College ID:</strong> {$row['collegeID']}</p>
              <p><strong>Current Year:</strong> {$row['currentYear']}</p>
              <p><strong>Course:</strong> {$row['course']}</p>
              <p><strong>Registration Number:</strong> {$row['registrationNumber']}</p>
              <p><strong>Family Income:</strong> {$row['familyIncome']}</p>
              <p><strong>Bank Account Number:</strong> {$row['bankAccountNumber']}</p>
              <p><strong>Bank Branch:</strong> {$row['bankBranch']}</p>
              <a href='dash.html' class='btn btn-primary' id='logoutBtn'>Logout</a>";
    }

    echo "    </div>
            </div>
        </div>

        <!-- Bootstrap JS (jQuery is required) -->
        <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js'></script>
        <!-- Custom JS -->
        <script src='dash.js'></script>
    </body>
    </html>";

    // You can add more details or customize the output based on your requirements
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();
?>
