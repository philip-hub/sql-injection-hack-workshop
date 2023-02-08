#!/bin/bash
# Ensure Script is executed under root privileges.
if [ "$EUID" -ne 0 ]
  then echo "Please run as root"
  exit
fi

cp index.html index.php style.css connect.php /var/www/html/

echo "Success! Website installed."

