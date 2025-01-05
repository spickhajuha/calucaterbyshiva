<?php
// 1. Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// 2. Validate and sanitize input (important for security)

// 3. Database connection and query (replace with your actual database credentials)
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 4. Prepare and execute SQL statement
$stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->bind_param("ss", $username, $password); 
$stmt->execute();
$result = $stmt->get_result();

// 5. Check if user exists
if ($result->num_rows > 0) {
    // Login successful
    // Redirect to the user's dashboard or another page
    header("Location: dashboard.php"); 
    exit();
} else {
    // Login failed
    // Display an error message to the user
    echo "Invalid username or password."; 
}

// 6. Close connection
$stmt->close();
$conn->close();
?>
