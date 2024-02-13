<?php
// include("contactus.html");

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];


$conn = new mysqli("localhost","root","", "contact");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$name = $conn->real_escape_string($name);
$email = $conn->real_escape_string($email);
$subject = $conn->real_escape_string($subject);
$message = $conn->real_escape_string($message);

// Construct email header
// $mailheader = "From: $name to  $email";

// You can now use $conn to execute queries or send data to your database
// For example, you can insert the form data into a table
$sql = "INSERT INTO data (Name, Email, Subject, Message) VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();



if( isset($name)|| isset($email)||isset($subject)||isset($message)){

// // $name = $_POST["name"];
// // $email = $_POST["email"];
// // $subject = $_POST["subject"];
// // $message = $_POST["message"];
// // $mailheader = "From:".$name."<".$email.">\r\n";
// // $mailheader = "Form:".$name."<".$email.">\r\n";
// // $headers = "From: .$name. " . "\r\n" .
// // "CC: aniket8nalawade@gmail.com";

// // $recipient = "aniket8nalawade@gmail.com";
// // $subject ="lkajdfkawhv";
// // $message="ikasjfdhaskjd";
// // mail($recipient, $subject, $message,$mailheader)
// // or die("Error!");
// /* ------------------------------------------------------------------*/

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "abhishekn22comp@student.mes.ac.in"; // Replace with your recipient email address
    $subject = "New Contact Form Submission";
    // $headers = "From: webmaster@example.com"; // Replace with your sending email address
    $message = "message: " . $_POST["message"] . "\n";
    // $message .= "Service: " . $_POST["service"] . "\n";
    $subject .= . $_POST["subject"] . "\n";

    if (mail($to, $subject, $message)) {
        echo "sent";
    } else {
        echo "Error sending message.";
    }
}
?>




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
        <p class="back">Go back to the <a href="home.html">Homepage</a></p>
    </div>
    
</body>
</html>



// ';
// }
}
else{
    echo 'not connected';
}



?>