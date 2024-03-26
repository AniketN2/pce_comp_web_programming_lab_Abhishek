
<?php
// $servername="localhost";
// $username ="root";
// $password="";
// $database_name="register";

// $conn = mysqli_connect($servername,$username, $password, $database_name);

// if(!$conn)
// {
//     die("Connection Failed:" . mysqli_connect_error());
// }
// if(isset($_POST['save' ]))
// {   
//     if(empty($_POST["Name"])){
//         $name = "Enter valid Name";
//     }
//     else{
//         $name = $_POST["Name"];
//     }
//     if(empty($_POST["Email"])){
//         $name = "Enter valid Email";
//     }
//     else{
//         $email = $_POST["Email"];
//     }
//     if(empty($_POST["Phone_Number"])){
//         $phone = "Enter valid Phone Number";
//     }
//     else{
//         $phone = $_POST["Phone_Number"];
//     }
//     if(empty($_POST["Password"])){
//         $password = "Enter valid Password";
//     }
//     else{
//         $pass = $_POST["Password"];
//         $password = password_hash($pass, PASSWORD_BCRYPT);
//     }
//     if(empty($_POST["Confirm_Password"])){
//         $con_password = "The two Passwords doesnt match";
//     }
//     else{
//         $cpass = $_POST["Confirm_Password"];
//         $con_password = password_hash($cpass, PASSWORD_BCRYPT);
//     }


//     $sql_query = "INSERT INTO `enterdetails` (`Name`, `Email`,`Phone_Number`,`Password`,`Confirm_Password`)
//     VALUES ('$name','$email','$phone','$password','$con_password')";
    
//     if (mysqli_query($conn, $sql_query))
//     {
//     echo "New Details Entry inserted successfully !";
//     }
//     else
//     {
//     echo "Error: ". $sql_query. "".mysqli_error($conn);
    
//     }

//     function test_input($data) {
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//       }
//     mysqli_close($conn);
// }


<?php
// Database connection
$servername = "sql113.infinityfree.com";
$username = "if0_36232482"; // Default username for XAMPP MySQL
$password = "Ab1An1Ma"; // Default password for XAMPP MySQL
$database = "if0_36232482_register"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$emailToCheck = $_POST["Email"]; // Email to check

// Check if user exists
$sql = "SELECT * FROM enterdetails WHERE email = '$emailToCheck'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists
    echo "User already exists in the database.";
} else {
    // User does not exist, add the user
    $sql ="INSERT INTO enterdetails (`Name`, `Email`,`Phone_Number`,`Password`,`Confirm_Password`)   VALUES ('$name','$email','$phone','$password','$con_password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New user added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>



?>