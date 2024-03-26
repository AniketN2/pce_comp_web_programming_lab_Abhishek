<?php
// Check if the form is submitted
$submit = $_POST["submit"];
if ($submit ) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Database connection parameters
    $servername = "localhost"; // Change this if your database is hosted elsewhere
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password (leave empty if none)
    $database = "contact"; // Change this to the name of your database
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    // Prepare and execute SQL statement to insert data into the table
    $sql = "INSERT INTO data (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    
    if ($conn->query($sql) === TRUE) {

        echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contactstyle.css">
</head>
<body>
    <div class="container">
        <h1>Thank You for contacting us. We will get to you as soon as possible</h1>
        <p class="back">Go back to the <a href="home.php">Homepage</a></p>
    </div>
    
</body>

</html>


';

}
else{
    echo 'not connected';
}
    } 
    
    // Close connection
    $conn->close();
    

    



    

    

?>
