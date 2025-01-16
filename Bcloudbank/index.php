<?php
// RDS connection details
$servername = "rds-database.c5o8e84socn9.eu-central-1.rds.amazonaws.com";  // Replace with your RDS endpoint
$username = "admin";    // Replace with your RDS username
$password = "Keegan*99";    // Replace with your RDS password
$dbname = "rds-database";    // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<h1>Bank Account Information</h1>";
echo "<p>Connected successfully to the RDS database!</p>";

// Fetch account data
$sql = "SELECT id, name, balance FROM accounts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Balance</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["name"]. "</td>
                <td>$" . $row["balance"]. "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No accounts found.</p>";
}

$conn->close();
?>