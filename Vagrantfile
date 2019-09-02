# -*- mode: ruby -*-
# vi: set ft=ruby :

# A Vagrantfile to set up three VMs, two webservers and a database server,
# connected together using an internal network with manually-assigned
# IP addresses for the VMs.

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"

 
  config.vm.define "webserver" do |webserver|
    webserver.vm.hostname = "webserver"
 
    webserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
    
    webserver.vm.network "private_network", ip: "192.168.2.30"

    webserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    webserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
            
      # Change VM's webserver's configuration to use shared folder.
      # (Look inside main-website.conf for specifics.)
      cp /vagrant/main-website.conf /etc/apache2/sites-available/
      # activate our website configuration ...
      a2ensite main-website
      # ... and disable the default website provided with Apache
      a2dissite 000-default
      # Reload the webserver configuration, to pick up our changes
      service apache2 reload
    SHELL
  end

  config.vm.define "dbserver" do |dbserver|
    dbserver.vm.hostname = "dbserver"
    dbserver.vm.network "private_network", ip: "192.168.2.31"
    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
    
    dbserver.vm.provision "shell", inline: <<-SHELL
      apt-get update

      export MYSQL_PWD='insecure_mysqlroot_pw'

      echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
      echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections

      apt-get -y install mysql-server

      echo "CREATE DATABASE fvision;" | mysql
      echo "CREATE USER 'webuser'@'%' IDENTIFIED BY 'insecure_db_pw';" | mysql
      echo "GRANT ALL PRIVILEGES ON fvision.* TO 'webuser'@'%'" | mysql
      export MYSQL_PWD='insecure_db_pw'

      cat /vagrant/setup-database.sql | mysql -u webuser fvision

      sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf
      service mysql restart
    SHELL
  end

  config.vm.define "translateserver" do |translateserver|
    translateserver.vm.hostname = "translateserver"
 
    translateserver.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"
    
    translateserver.vm.network "private_network", ip: "192.168.2.32"

    translateserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    translateserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
            
      # Change VM's translateserver's configuration to use shared folder.
      # (Look inside translate-website.conf for specifics.)
      cp /vagrant/translate-website.conf /etc/apache2/sites-available/
      # activate our website configuration ...
      a2ensite translate-website
      # ... and disable the default website provided with Apache
      a2dissite 000-default
      # Reload the webserver configuration, to pick up our changes
      service apache2 reload
    SHELL
  end
end
