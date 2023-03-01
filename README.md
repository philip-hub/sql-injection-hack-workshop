# SQL injection hack workshop

Build In | Contributors | Live version
--- | --- | ---
**PHP/SQL/HTML/CSS** | [@philip-hub](https://github.com/philip-hub) | Clone and run with your local SQL server

# Description and Setup
A modified version of [sql-injectiono-hack-workshop](https://github.com/philip-hub/sql-injection-hack-workshop) to run on a Debian or Ubuntu machine hosting a LAMP stack application.

This is a dummy bank website with poor security to teach people about the basics of SQL injection. This website requires a PHP server and a SQL server with a database as well as a table both named mhc_bank. The mhc_bank table has three TEXT columns labeled  "username" , "password", and "amount". You can setup the website and install all of its dependences by running this repo's installation script. In a terminal, run ```sudo ./install.sh```. After the installation script is done running, modifiy ```connect.php``` in ```/var/www/html``` with your favorite text editor under root privileges. Edit the following code.<br>

```
<?php
$servername = "localhost"; // Use localhost (127.0.0.1) as server.
$username = "username"; // Replace the value "username" with the username for your MySQL root account.
$password = "password"; // Replace the vaule "password" with the password for your MySQL root account.
$dbname = "mhc_bank"; // Use mhc_bank database.
?>

```
<p>Verify the website is working by opening a web browser and going to http://localhost/. Once at the login page, try signing in to a user's account. Reference the article below and try some SQL injection commands. W3 Schools has a great article about SQL injection <a href="https://www.w3schools.com/sql/sql_injection.asp">here.</a></p>

---

