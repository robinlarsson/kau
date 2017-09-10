# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "hashicorp/precise64"
  config.vm.network "forwarded_port", guest: 80, host: 8080
 # config.vm.network "public_network", ip: "10.0.2.15"
 # config.vm.network "forwarded_port", guest: 15443, host: 15443

  config.vm.provision "shell", inline: <<-SHELL
    apt-get update
    apt-get install -y apache2
    apt-get install -y php5 libapache2-mod-php5 php5-cli
    apt-get install -y vim tree

    # Install latest stable version of `node` and `npm`
    # https://github.com/joyent/node/wiki/Installing-Node.js-via-package-manager#ubuntu-mint-elementary-os
    if ! which node &> /dev/null; then
      sudo apt-get install -y python-software-properties python g++ make
      sudo add-apt-repository -y ppa:chris-lea/node.js
      sudo apt-get update
      sudo apt-get install -y nodejs
    fi

    if ! which git &> /dev/null; then
      sudo apt-get install git -y
    fi

    #cd /vagrant
    #if ! test -d npm &> /dev/null; then
     # git clone https://github.com/npm/npm.git
      #cd npm
      #npm install
    #fi

    sudo rm -rf /var/www
    ln -s /vagrant /var/www

    echo "cd /vagrant" >> /home/vagrant/.bashrc
  SHELL
end
