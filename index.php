<?php
include 'connect.php';

//Make a SQL Connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username=$_POST["username"];
$password = $_POST["password"];
$sql = "SELECT * FROM Users WHERE Name ='".$username."' AND Pass ='".$password."'";
$result = mysqli_query($conn, $sql);
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

$html_contents = <<<HTML
          <p>$result</p>
          HTML;

echo $html_contents;

?>
</form>
</body>
</html>