<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $transaction_id = $_POST['transaction_id'];
    $investment_amount = $_POST['investment_amount'];
    
    // Your database credentials
    $servername = "localhost"; // Replace with your MySQL server hostname
    $username = "root"; // Replace with your MySQL database username
    $password = ""; // Replace with your MySQL database password
    $dbname = "kajal"; // Replace with your MySQL database name
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO customer_investment (name, transaction_id, investment_amount) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $transaction_id, $investment_amount);
    
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
