<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'scholarship_registration');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all student data
$sql = "SELECT * FROM students where status ='Pending'";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    // Output data in a table
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>College Name</th>
                <th>Course</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
            echo " <tr>
                <td>{$row['id']}</td>
                <td>{$row['userID']}</td>
                <td>{$row['password']}</td>
                <td>{$row['studentName']}</td>
                <td>{$row['stateOfOrigin']}</td>
                <td>{$row['contactEmail']}</td>
                <td>{$row['contactPhone']}</td>
                <td>{$row['aadharNumber']}</td>
                <td>{$row['incomeCertificateNumber']}</td>
                <td>{$row['residentialCertificateNumber']}</td>
                <td>{$row['collegeName']}</td>
                <td>{$row['collegeLocation']}</td>
                <td>{$row['collegeType']}</td>
                <td>{$row['collegeID']}</td>
                <td>{$row['currentYear']}</td>
                <td>{$row['course']}</td>
                <td>{$row['registrationNumber']}</td>
                <td>{$row['familyIncome']}</td>
                <td>{$row['bankAccountNumber']}</td>
                <td>{$row['bankBranch']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();
?>
