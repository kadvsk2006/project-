<?php
$servername = "localhost";
$username = "root";
$password = "Aditya1015*";
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create DB if not exists
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Create `menu` table
$sql = "CREATE TABLE IF NOT EXISTS menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100),
    category VARCHAR(50),
    price DECIMAL(6,2)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'menu' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if items already exist
$check = $conn->query("SELECT COUNT(*) AS count FROM menu");
$row = $check->fetch_assoc();

if ($row['count'] == 0) {
    $sql_insert = "
        INSERT INTO menu (item_name, category, price) VALUES
        -- Food Items
        ('Butter Chicken', 'food', 300.00),
        ('Paneer Tikka', 'food', 250.00),
        ('Garlic Naan', 'food', 50.00),
        ('Chicken Biryani', 'food', 300.00),
        ('Dal Makhani', 'food', 180.00),
        ('Chole Bhature', 'food', 220.00),
        ('Palak Paneer', 'food', 200.00),
        ('Masala Dosa', 'food', 120.00),

        -- Drink Items
        ('Masala Chai', 'beverage', 80.00),
        ('Mango Lassi', 'beverage', 75.00),
        ('Sweet Lassi', 'beverage', 65.00),
        ('Badam Milk', 'beverage', 90.00),
        ('Thandai', 'beverage', 85.00),
        ('Coffee', 'beverage', 50.00)
    ";
    if ($conn->query($sql_insert) === TRUE) {
        echo "Menu items inserted successfully.";
    } else {
        echo "Error inserting items: " . $conn->error;
    }
} else {
    echo "Items already exist. Skipping insertion.";
}

$conn->close();
?>
