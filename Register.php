<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Validate form data (you can add more validation)
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required";
    } else {
        // Connect to database (assuming MySQL here)
        $conn = new mysqli("localhost", "username", "password", "database");
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Hash password (for security)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert data into database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Close connection
        $conn->close();
    }
}
?>