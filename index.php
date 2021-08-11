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
    $bank_info = "<p>Sorry This Account does not exsist<br><a href ='index.html'>Return to Sign In</a></p>";
}


?>
<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>
    *Your* Secure Info
    </title>
</head>
<body>
<h1>Here is your personal info we do not share it with anyone</h1><br>
<center><a href ='index.html'>Return to Sign In</a></center><br>
<?php



echo $bank_info;

?>
<br>
<br>
<br>
<center>
<a href="https://www.instagram.com/memphishackclub/" target="_blank" class="fa fa-instagram"></a>
<a href="https://twitter.com/MHackclub" target="_blank" class="fa fa-twitter"></a>
<a href="https://www.facebook.com/groups/656997425191729" target="_blank" class="fa fa-facebook"></a>
 <a href="https://www.linkedin.com/company/memphis-hack-club/?viewAsMember=true" class="fa fa-linkedin" target="_blank"></a>
 <a href="https://www.youtube.com/channel/UCQEw733Z4ID3AVLtFpQ5hyw" class="fa fa-youtube" target="_blank"></a>
 <br>
 </center>
</body>
</html>