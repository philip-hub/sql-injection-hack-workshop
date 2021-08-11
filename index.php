<?php
include 'connect.php';

//Make a SQL Connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Make a SQL query
$username=$_POST["username"];
$password = $_POST["password"];
$sql = 'SELECT * FROM userinfo WHERE username ="'.$username.'" AND password ="'.$password.'";';
// echo $sql;
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    $bank_info ="";
    while($row = $result->fetch_assoc()) {
        
        
        $bank_info = "<br> <p>Your username in case you forgot ". $row["username"]. " - Your password : ". $row["password"]. "  Your hard earned money is $" . $row["amount"] . "</p><br>".$bank_info;
           
        
    }
} else {
    $bank_info = "<p>Sorry 0 results</p>";
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>
    *Your* Secure Info
    </title>
</head>
<body>
<h1>Here is your personal info we do not share it with anyone</h1><br>
<?php



echo $bank_info;

?>
</form>
</body>
</html>