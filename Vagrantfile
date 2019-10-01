# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "dummy"

  config.vm.provider :aws do |aws, override|
    aws.region = "us-east-1"

    override.nfs.functional = false
    override.vm.allowed_synced_folder_types = :rsync

    aws.keypair_name = "cosc349"

    override.ssh.private_key_path = "~/.ssh/cosc349.pem"

    aws.instance_type = "t2.micro"

    aws.security_groups = ["sg-0ccc1768eaf2d07d1", "sg-0666dd71712972285"]

    aws.availability_zone = "us-east-1a"
    aws.subnet_id = "subnet-a9bde387"
    
    aws.ami = "ami-04763b3055de4860b"

    override.ssh.username = "ubuntu"
  end

  
  config.vm.define "webserver" do |webserver|
    webserver.vm.hostname = "webserver"

    webserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
      cp /vagrant/main-website.conf /etc/apache2/sites-available/
      chmod 777 /vagrant
      chmod 777 /vagrant/www
      a2ensite main-website
      a2dissite 000-default
      service apache2 reload
    SHELL
  end

  
  config.vm.define "translateserver" do |translateserver|
    translateserver.vm.hostname = "translateserver"

    translateserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
      cp /vagrant/translate-website.conf /etc/apache2/sites-available/
      chmod 777 /vagrant
      chmod 777 /vagrant/www/
      chmod 777 /vagrant/www/translate
      a2ensite translate-website
      a2dissite 000-default
      service apache2 reload
    SHELL
  end



  config.vm.provision "shell", inline: <<-SHELL
     apt-get update
     apt-get install -y apache2
   SHELL
end


