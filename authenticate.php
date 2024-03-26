<?php
include "home.php";
session_start();

$servername = "sql113.infinityfree.com";
$username = "if0_36232482";
$password = "Ab1An1Ma";
$dbname = "if0_36232482_register";

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

        try (password_verify($psw, $stored_psw)) {
            $logged = true;
            $_SESSION['Email'] = $uname;
            $_SESSION['username'] = $uname; // Consistent session variable
            
            echo "<script>alert('Welcome to Purify')</script>";
            header("Location: home.php");
            exit();
        } catch{
            echo "Invalid password.";
        }
    } else {
        echo "Invalid Email.";
    }
}

$conn->close();
?>
