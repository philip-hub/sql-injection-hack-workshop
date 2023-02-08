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
$sql = 'SELECT * FROM mhc_bank WHERE username ="'.$username.'" AND password ="'.$password.'";';
// echo $sql;
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<br><h1>Here is your personal info we do not share it with anyone</h1><br>
    <center><a href ='index.html'>Return to Sign In</a></center><br>";
    $bank_info ="";
    $row_check =array();
    while($row = $result->fetch_assoc()) {
        
        if (!in_array($row["username"], $row_check)){
        $bank_info = "<div id='bankinfo'><br><p id='name'>Username: ". $row["username"]. " </p><br><p id='password'> Password: ". $row["password"]. "  </p><br><p id='money'> Balance: $" . $row["amount"] . "</p><br></div><br>".$bank_info;
        array_push($row_check, $row["username"]);
        }
        else{
            echo "<br>";
        }
    }
} else {
    $bank_info = "
    <style>
        body {
            width: auto;
            height: auto;
            background: rgb(65,64,64);
            color: #f0f0f0;
            font-family: Arial, Helvetica, sans-serif;
            box-shadow: 0 20000px rgba(15, 15, 15, .96)  inset;
        }
    </style>
    <br><p>Sorry This Account does not exsist<br><br><a href ='index.html'>Return to Sign In</a></p>";
}

?>
<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
    <title>
    *Your* Secure Info
    </title>
</head>
<body>

<?php
echo $bank_info;
?>

<br>
<br>
<br>

</body>
</html>
