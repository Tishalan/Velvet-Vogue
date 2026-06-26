<?php
session_start();
$servername = "localhost";
$username = "root";  // MySQL username
$password = "";      // MySQL password
$dbname = "velvet_vogue";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login or signup actions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'signup') {
        // Sign up logic
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phonenumber = $_POST['Number'];
        // Insert into Users table
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, phonenumber) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $password, $email, $phonenumber);

        if ($stmt->execute()) {
            echo "<script>alert('Sign up successful!');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    }

    if (isset($_POST['action']) && $_POST['action'] == 'login') {
        // Login logic
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Admin login check
        if ($username == 'Admin' && $password == '123') {
            // Redirect to Admin Dashboard
            header('Location: Admindb\Admindb.php');
            exit;
        }

        // Customer login check
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Compare the entered password with the plain text password stored in the database
            if ($password == $user['password']) {  // No hashing here, just compare directly
                // Login successful, redirect to customer dashboard
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                echo "<script> window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Incorrect password.'); window.location.href='login.html';</script>";
            }
        } else {
            echo "<script>alert('User not found.');</script>";
        }
    }
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
</body>
</html>
