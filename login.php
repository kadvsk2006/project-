    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    header("Content-Type: application/json");

    // Database credentials
    $host = "localhost";
    $username = "root";
    $dbpassword = "Aditya1015*";
    $database = "restaurant";

    // Connect to MySQL
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(["status" => "error", "message" => "Database connection failed"]);
        exit();
    }

    // Get raw POST data
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if all fields are present
    if (!isset($data["email"]) || !isset($data["password"])) {
        echo json_encode(["status" => "error", "message" => "All fields are required"]);
        exit();
    }

    $email = trim($data["email"]);
    $password = $data["password"];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Use password_verify to compare hashed passwords
        if (password_verify($password, $user["password"])) {
            echo json_encode(["status" => "success", "message" => "Login successful"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Incorrect password"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "User not found"]);
    }

    $stmt->close();
    $conn->close();
    ?>
