<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// $mailheader = "Form:".$name."<".$email.">\r\n";

$recipient = "aniket8nalawade@gmail.com";
// $headers = "From: .$name. " . "\r\n" .
// "CC: aniket8nalawade@gmail.com";
mail($recipient, $subject, $message)
or die("Error!");

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


';

?>