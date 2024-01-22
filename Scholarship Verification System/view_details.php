<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            padding: 20px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-top: 20px;
        }

        button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'scholarship_registration');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the user ID from the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch detailed information for the selected user
        $sql = "SELECT * FROM students WHERE id = $id";
        $result = $conn->query($sql);

        // Check if the record exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Display detailed information
            echo "<h2 class='mb-4'>User Details</h2>";
            echo "<table class='table table-bordered'>
                    <tr>
                        <th>Scholarship_ID</th>
                        <td>{$row['id']}</td>
                    </tr>
                    <tr>
                        <th>User ID</th>
                        <td>{$row['userID']}</td>
                    </tr>
                    <!-- Add other rows for each field -->
                    <tr>
                    <th>Password</th>
                    <td>{$row['password']}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{$row['studentName']}</td>
                </tr>
                <tr>
                    <th>State of Origin</th>
                    <td>{$row['stateOfOrigin']}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{$row['contactEmail']}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{$row['contactPhone']}</td>
                </tr>
                <tr>
                    <th>Aadhar Number</th>
                    <td>{$row['aadharNumber']}</td>
                </tr>
                <tr>
                    <th>Income Certificate Number</th>
                    <td>{$row['incomeCertificateNumber']}</td>
                </tr>
                <tr>
                    <th>Residential Certificate Number</th>
                    <td>{$row['residentialCertificateNumber']}</td>
                </tr>
                <tr>
                    <th>College Name</th>
                    <td>{$row['collegeName']}</td>
                </tr>
                <tr>
                    <th>College Location</th>
                    <td>{$row['collegeLocation']}</td>
                </tr>
                <tr>
                    <th>College Type</th>
                    <td>{$row['collegeType']}</td>
                </tr>
                <tr>
                    <th>College ID</th>
                    <td>{$row['collegeID']}</td>
                </tr>
                <tr>
                    <th>Current Year</th>
                    <td>{$row['currentYear']}</td>
                </tr>
                <tr>
                    <th>Course</th>
                    <td>{$row['course']}</td>
                </tr>
                <tr>
                    <th>Registration Number</th>
                    <td>{$row['registrationNumber']}</td>
                </tr>
                <tr>
                    <th>Family Income</th>
                    <td>{$row['familyIncome']}</td>
                </tr>
                <tr>
                    <th>Bank Account Number</th>
                    <td>{$row['bankAccountNumber']}</td>
                </tr>
                <tr>
                    <th>Bank Branch</th>
                    <td>{$row['bankBranch']}</td>
                </tr>
                </table>";

            // Add buttons for approval and decline
            echo "<form action='process_application.php' method='post'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <button type='submit' name='approve' class='btn btn-success'>Approve</button>
                    <button type='submit' name='decline' class='btn btn-danger'>Decline</button>
                </form>";
        } else {
            echo "<p class='text-danger'>User not found</p>";
        }
    } else {
        echo "<p class='text-danger'>Invalid request</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

    <!-- Bootstrap JS (jQuery is required) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
