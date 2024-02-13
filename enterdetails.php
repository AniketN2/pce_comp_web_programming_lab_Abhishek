‹?php
$servername="localhost";
Susername-"root";
$password="";
$database_name="register";

$conn mysqli_connect($server_name, Susername, $password, $database_name);
//check the connection
if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}
if(isset($_POST[' save' ]))
{
    $name = $_POST["Name"];
    $email= $_POST["Email"];
    $phone = $_POST["Phone Number"];
    $password = $_POST["Password"];
    $con_password = $_POST["Confirm Password"];


    $sql query= "INSERT INTO enterdetails (Name, Email,Phone Number,Password,Confirm Password)
    VALUES ("$name","$email","$phone","$password","$con_password");

    if (mysqli_query(Sconn, $sql_query))
    {
    echo "New Details Entry inserted successfully !";
    }
    else
    {
    echo "Error: ". $sql. "" mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>