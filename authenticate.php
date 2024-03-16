<?php
include "home.html";
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];
    
    $sql = "SELECT * FROM enterdetails WHERE Email='$uname'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
 
        $row = $result->fetch_assoc();
        $stored_psw = $row['Password'];
        $clientname = $row['Name'];

        if (password_verify($psw, $stored_psw)) {
            $_SESSION['Email'] = $uname;
            header("Location: home.html");
            function displayRandomWelcome() {
                $message = "Welcome to Purify";
                $_SESSION['username'] = $uname;
                try{
                    echo "<script>alert('$message');</script>";
                }
                catch(Exception $e) {
                    echo 'Message: ' .$e->getMessage();
                  }
            }
            displayRandomWelcome();
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        
        echo "Invalid Email.";
    }
}

$conn->close();
?>

