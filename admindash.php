<?php
$host = "localhost";
$username = "root";
$password = "Aditya1015*"; // Use your actual password
$dbname = "restaurant";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL to create customers table
$sql = "CREATE TABLE IF NOT EXISTS customers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  phone VARCHAR(20) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table 'customers' created successfully.";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
/*header("Content-Type: application/json");

// DB connection
$host = "localhost";
$username = "root";
$password = "Aditya1015*";
$database = "restaurant";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

$sql = "SELECT name, email, phone FROM users";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode($users);
} else {
    echo json_encode([]);
}

$conn->close();*/
?>

