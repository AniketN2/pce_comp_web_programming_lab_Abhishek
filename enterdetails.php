
<?php
$servername="localhost";
$username ="root";
$password="";
$database_name="register";

$conn = mysqli_connect($servername,$username, $password, $database_name);
//check the connection
if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}
if(isset($_POST['save' ]))
{
    $name = $_POST["Name"];
    $email= $_POST["Email"];
    $phone = $_POST["Phone_Number"];
    $password = $_POST["Password"];
    $con_password = $_POST["Confirm_Password"];


    $sql_query = "INSERT INTO enterdetails ('$name','$email','$phone','$password','$con_password')
    VALUES (Name, Email,Phone Number,Password,Confirm_Password)";

    if (mysqli_query(Sconn, $sql_query))
    {
    echo "New Details Entry inserted successfully !";
    }
    else
    {
    echo "Error: ". $sql. "".mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>