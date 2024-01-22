<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    </style>
</head>
<body>
<h1>Pending Requests</h1>
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'scholarship_registration');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch selected student data
    $sql = "SELECT id, userID, status FROM students where status='Pending'";
    $result = $conn->query($sql);

    // Check if there are any records
    if ($result->num_rows > 0) {
        // Output data in a table
        echo "<table class='table table-bordered'>
                <thead class='thead-dark'>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['userID']}</td>
                    <td>{$row['status']}</td>
                    <td><a href='view_details.php?id={$row['id']}' class='btn btn-primary'>View Details</a></td>
                </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p class='alert alert-warning'>No records found</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

    <!-- Bootstrap JS (jQuery is required) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
