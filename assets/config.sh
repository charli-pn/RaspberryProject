sudo apt-get update -y
sudo apt-get upgrade -y
sudo apt-get install apache2 -y
sudo chown -R pi:www-data /var/www/html/
sudo chmod -R 770 /var/www/html/
sudo apt-get install php5
sudo apt-get install mysql-server php5-mysql
sudo apt-get install phpmyadmin
sudo nano /etc/phpmyadmin/config.inc.php
sudo apt-get install git -y
git clone https://github.com/charlotte-pi/RaspberryProject