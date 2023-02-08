#!/bin/bash
# Colors
RED='\033[0;31m'
GREEN='\u001b[32m'
YELLOW='\u001b[33m'
NC='\033[0m'

# Ensure Script is executed under root privileges.
if [ "$EUID" -ne 0 ]
then echo -e "${RED}-RUN AS ROOT-${NC}"
exit
fi

# Update & Upgrade System
echo -e "Update System? ${GREEN}Y${YELLOW}/${RED}N${NC}"
read input

if [[ $input == Y ]] || [[ $input == y ]] || [[ $input == yes ]]; then
  apt update && apt upgrade -y
  apt autoremove -y
  echo -e "${GREEN}-SYSTEM UPDATED-${NC}" 
elif [[ $input == N ]] || [[ $input == n ]] || [[ $input == no ]]; then
  echo -e "${RED}-SYSTEM NOT UPDATED-${NC}" 
else
  echo -e "${RED}-INVALID INPUT-${NC}"
fi

# Install Apache
echo -e "Install Apache? ${GREEN}Y${YELLOW}/${RED}N${NC}"
read input

if [[ $input == Y ]] || [[ $input == y ]] || [[ $input == yes ]]; then
  apt install apache2 apache2-utils -y
  systemctl enable apache2
  systemctl start apache2
  echo -e "${GREEN}-APACHE INSTALLED-${NC}" 
elif [[ $input == N ]] || [[ $input == n ]] || [[ $input == no ]]; then
  echo -e "${RED}-APACHE NOT INSTALLED-${NC}" 
else
  echo -e "${RED}-INVALID INPUT-${NC}"
fi


# Install MySQL (MariaDB)
echo -e "Install MySQL? ${GREEN}Y${YELLOW}/${RED}N${NC}"
read input

if [[ $input == Y ]] || [[ $input == y ]] || [[ $input == yes ]]; then
  apt install mariadb-server -y
  systemctl enable mariadb
  systemctl start mariadb
  echo -e "${GREEN}-MYSQL INSTALLED-${NC}" 
elif [[ $input == N ]] || [[ $input == n ]] || [[ $input == no ]]; then
  echo -e "${RED}-MYSQL NOT INSTALLED-${NC}" 
else
  echo -e "${RED}-INVALID INPUT-${NC}"
fi

# Configure MySQL Service
echo -e "Configure MySQL Service? ${GREEN}Y${YELLOW}/${RED}N${NC}"
read input

if [[ $input == Y ]] || [[ $input == y ]] || [[ $input == yes ]]; then
  mysql_secure_installation
  echo -e "${GREEN}-MYSQL SERVICE CONFIGURED-${NC}" 
elif [[ $input == N ]] || [[ $input == n ]] || [[ $input == no ]]; then
  echo -e "${RED}-MYSQL SERVICE NOT CONFIGURED-${NC}" 
else
  echo -e "${RED}-INVALID INPUT-${NC}"
fi

# Configure MySQL Database
echo -e "Configure MySQL Database? ${GREEN}Y${YELLOW}/${RED}N${NC}"
read input

if [[ $input == Y ]] || [[ $input == y ]] || [[ $input == yes ]]; then
  echo "Enter password for MySQL root account."
  mysql -u root -p < setupDatabase.sql
  echo -e "${GREEN}-MYSQL DATABASE CONFIGURED-${NC}" 
elif [[ $input == N ]] || [[ $input == n ]] || [[ $input == no ]]; then
  echo -e "${RED}-MYSQL DATABASE NOT CONFIGURED-${NC}" 
else
  echo -e "${RED}-INVALID INPUT-${NC}"
fi

# Install PHP
echo -e "Install PHP? ${GREEN}Y${YELLOW}/${RED}N${NC}"
read input

if [[ $input == Y ]] || [[ $input == y ]] || [[ $input == yes ]]; then
  apt install php php-cli php-mysql libapache2-mod-php php-gd php-xml php-curl php-common -y
  echo -e "${GREEN}-PHP INSTALLED-${NC}" 
elif [[ $input == N ]] || [[ $input == n ]] || [[ $input == no ]]; then
  echo -e "${RED}-PHP NOT INSTALLED-${NC}" 
else
  echo -e "${RED}-INVALID INPUT-${NC}"
fi

# Install Website
echo -e "Install Website? ${GREEN}Y${YELLOW}/${RED}N${NC}"
read input

if [[ $input == Y ]] || [[ $input == y ]] || [[ $input == yes ]]; then
  # Move files to /var/www/html
  echo "cp index.html index.php style.css connect.php /var/www/html/"
  cp index.html index.php style.css connect.php /var/www/html/
  echo -e "${GREEN}-WEBSITE INSTALLED-${NC}" 
elif [[ $input == N ]] || [[ $input == n ]] || [[ $input == no ]]; then
  echo -e "${RED}-WEBSITE NOT INSTALLED-${NC}" 
else
  echo -e "${RED}-INVALID INPUT-${NC}"
fi

