# SQL injection hack workshop

Build In | Contributors | Live version
--- | --- | ---
**PHP/SQL/HTML/CSS** | [@philip-hub](https://github.com/philip-hub) | Clone and run with your local SQL server

# Description and Setup
A tweaked version of [sql-injectiono-hack-workshop](https://github.com/philip-hub/sql-injection-hack-workshop) to run on a LAMP stack with minimal dependences.

This is a dummy bank website with poor security to teach people about the basics of SQL injection. In order to use this you will need a PHP server and you will need to create a SQL server, database, and table. Name your table  and database "mhc_bank" without the quotes. In your table create the columns "username" , "password", and "amount" as type TEXT all as those are spelled without the quotes. Use the insert command in the menu bar to add some fake users with passwords and amounts. Then open the your repo path in your favorite a text or code editor. Create a connect.php file. Put the following code in connect.php.<br>

```
<?php
$servername = "localhost"; //127.0.0.1 works too.
$username = "root"; //Username for MySQL root account.
$password = "root"; //Password for MySQL root account.
$dbname = "mhc_bank";
?>
```
<p>Try signing in to one user's account then reference the article below and the source code and try some SQL injection commands.
W3 Schools has a great article about SQL injection <a href="https://www.w3schools.com/sql/sql_injection.asp">here</a></p>

---

