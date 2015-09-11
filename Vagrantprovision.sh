#! /usr/bin/env bash


echo -e "\n--- Updating packages list ---\n"

# Change to canadian mirrors
sed -i 's/archive.ubuntu.com/ubuntu.mirror.iweb.ca/g' /etc/apt/sources.list
apt-get -qq update

locale-gen fr_CA.utf8 > /dev/null 2>&1
locale-gen fr_FR.utf8 > /dev/null 2>&1
ln -sf /usr/share/zoneinfo/Canada/Eastern /etc/localtime



# ---------------------------------------------------------------



echo -e "\n--- Installing base packages ---\n"
apt-get -y install vim curl build-essential python-software-properties git unzip > /dev/null 2>&1

add-apt-repository ppa:ondrej/php5-5.6 > /dev/null 2>&1
add-apt-repository ppa:chris-lea/node.js > /dev/null 2>&1

apt-get -qq update



# ---------------------------------------------------------------



echo -e "\n--- Installing MySQL and phpMyAdmin ---\n"

DEBIAN_FRONTEND=noninteractive apt-get -y install mysql-server-5.5 > /dev/null 2>&1

echo "phpmyadmin phpmyadmin/dbconfig-install boolean true" | debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/app-pass string" | debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/admin-user string root" | debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/admin-pass string" | debconf-set-selections
echo "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2" | debconf-set-selections
DEBIAN_FRONTEND=noninteractive apt-get install -y --force-yes phpmyadmin > /dev/null 2>&1


# Autologin in phpmyadmin
sed -i 's/if (!empty($dbname)) {/if (!empty($dbname)) { $cfg['Servers'][$i]['AllowNoPassword'] = true;/' /etc/phpmyadmin/config.inc.php
sed -i "s|// \$cfg\['Servers'\]\[\$i\]\['AllowNoPassword'\] = TRUE;|   \$cfg['Servers'][\$i]['AllowNoPassword'] = TRUE;|" /etc/phpmyadmin/config.inc.php
sed -i "s|\$cfg\['Servers'\]\[\$i\]\['auth_type'\] = 'cookie';|\$cfg\['Servers'\]\[\$i\]\['auth_type'\] = 'config';\$cfg\['Servers'\]\[\$i\]\['user'\] = 'root';\$cfg\['Servers'\]\[\$i\]\['password'\] = '';|" /etc/phpmyadmin/config.inc.php



# ---------------------------------------------------------------



echo -e "\n--- Installing PHP packages ---\n"

apt-get -y install php5 apache2 libapache2-mod-php5 php5-curl php5-gd php5-mcrypt php5-mysql > /dev/null 2>&1
a2enmod rewrite > /dev/null 2>&1



# ---------------------------------------------------------------



echo -e "\n--- Configuring apache ---\n"
sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/apache2.conf
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini


echo "<VirtualHost *:80>
    ServerName site.vagrant
    DocumentRoot \"/home/vagrant/site/public\"

    <Directory /home/vagrant/site/public>
        Options Indexes FollowSymLinks
	    AllowOverride All
	    Require all granted
    </Directory>
</VirtualHost>" > /etc/apache2/sites-available/site.vagrant.conf
a2ensite site.vagrant > /dev/null 2>&1


php5enmod mcrypt
service apache2 restart > /dev/null 2>&1



# ---------------------------------------------------------------



echo -e "\n--- Installing Composer/NodeJS/NPM ---\n"

curl --silent https://getcomposer.org/installer | php > /dev/null 2>&1
mv composer.phar /usr/local/bin/composer

curl --silent --location https://deb.nodesource.com/setup_0.12 | sudo bash -
apt-get -y install nodejs > /dev/null 2>&1

curl --silent https://www.npmjs.org/install.sh | sh > /dev/null 2>&1



npm install -g gulp bower > /dev/null 2>&1


#cd /vagrant
#sudo -u vagrant -H sh -c "composer install" > /dev/null 2>&1
#cd /vagrant/client
#sudo -u vagrant -H sh -c "npm install" > /dev/null 2>&1
#sudo -u vagrant -H sh -c "bower install -s" > /dev/null 2>&1
#sudo -u vagrant -H sh -c "gulp" > /dev/null 2>&1