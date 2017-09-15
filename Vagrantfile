# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "bento/ubuntu-16.04"
  config.vm.hostname = "localhost"
  config.vm.network "forwarded_port", guest: 80, host: 8080,
    auto_correct: true

  config.vm.provision "shell", inline: <<-SHELL
    apt-get update

    if ! which apache2 &> /dev/null; then
        sudo apt-get install -y apache2
    fi

    if ! which php &> /dev/null; then
        sudo apt-get install -y php libapache2-mod-php php-cli
    fi

    if ! which vim &> /dev/null; then
        sudo apt-get install -y vim
        sudo apt-get install -y tree
    fi

    if ! which nodejs &> /dev/null; then
      sudo apt-get install -y nodejs
    fi

    if ! which npm &> /dev/null; then
      sudo apt-get install -y npm
    fi

    if ! which git &> /dev/null; then
      sudo apt-get install git -y
    fi

    if ! [ -L /var/www ]; then
        sudo rm -rf /var/www/html
        ln -s /vagrant /var/www/html
    fi

    if ! cat /etc/apache2/httpd.conf &> /dev/null; then
        echo "ServerName localhost" >> /etc/apache2/httpd.conf
        echo "cd /vagrant" >> /home/vagrant/.bashrc
    fi

    echo "cd /vagrant"
    npm install

    sudo service apache2 restart
  SHELL
end
