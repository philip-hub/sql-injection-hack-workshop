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
    $row_check ="";
    while($row = $result->fetch_assoc()) {
        
        if ($row["username"]!= $row_check){
        $bank_info = "<p>Username: ". $row["username"]. " <br> Password: ". $row["password"]. "  <br> Balance: $" . $row["amount"] . "</p><br>".$bank_info;
        $row_check = $row["username"];
        }
        else{
            echo "<br>";
        }
    }
} else {
    $bank_info = "<p>Sorry This Account does not exsist</p>";
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