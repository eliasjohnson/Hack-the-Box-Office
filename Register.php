<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "your_database_name";
    
    // Validate form data (you can add more validation)
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required";
    } else {
        // Connect to database (assuming MySQL here)
        $conn = new mysqli($servername, $db_username, $db_password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        
        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashed_password')");
        $stmt->bind_param("ss", $username, $email, $hashed_password);
        
        // if ($conn->query($sql) == TRUE) 
        //     echo "Registration successful";
        // else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }
        if ($stmt->execute()) {
            // Redirect to home page
            header("Location: Index.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        
        
        // Close connection
        $stmt->close();
        $conn->close();
    }
}
?>