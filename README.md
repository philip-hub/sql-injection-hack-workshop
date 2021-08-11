# SQL injection hack workshop

Build In | Contributors | Live version
--- | --- | ---
**PHP/SQL/HTML/CSS** | [@philip-hub](https://github.com/philip-hub) | Clone and run with your local SQL server

![SQL Server Hacking](https://i.giphy.com/media/TOWeGr70V2R1K/giphy.webp)

# Description and Setup

This is a dummy bank website with poor security to teach people about the basics of SQL injection. In order to use this you will need a PHP server and you will need to create a SQL server, database, and table. Both of these tasks can easliy be done with [MAMP](https://www.mamp.info/en/). Once MAMP is instaled clone this repo to the desired path on your machine. MAMP Preferences then Web Server and navigate to the path that you cloned this repo too. Start MAMP up and should bring you to a MAMP homepage on your local host where you can access myPHPAdmin. Use myPHPadmin to create a SQL database and table. This [video](https://www.youtube.com/watch?v=s7p5aS8m57k) is a good guide for this task. Name your table "mhc_bank" without the quotes. In your table create the columns "username" , "password", and "amount" as type TEXT all as those are spelled without the quotes. Use the insert command in the menu bar to add some fake users with passwords and amounts. Then open the your repo path in your favorite a text or code editor. Create a connect.php file. Put the following code in connect.php.<br>

```
<?php
$servername = "localhost:8889"; //on Mac (and maybe window) but this is displayed on in myPHPAdmin when in the table menu
$username = "root"; //with default mamp settings
$password = "root"; //with default mamp settings
$dbname = "mhc_bank";
?>
```
<p>Try signing in to one user's account then refernce the article below and the source code and try some SQL injection commands.
W3 Schools has a great article about SQL injection <a href="https://www.w3schools.com/sql/sql_injection.asp">here</a></p>
---

