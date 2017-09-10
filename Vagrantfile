# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "hashicorp/precise64"
  config.vm.network "forwarded_port", guest: 15443, host: 15443

  config.vm.provision "shell", inline: <<-SHELL
    apt-get update
    apt-get install -y apache2
    apt-get install -y php5 libapache2-mod-php php-mcrypt php5-cli
    apt-get install -y vim tree
  SHELL

    # Install latest stable version of `node` and `npm`
    # https://github.com/joyent/node/wiki/Installing-Node.js-via-package-manager#ubuntu-mint-elementary-os
    $install_node = <<SCRIPT
    if ! which node &> /dev/null; then
      sudo apt-get install -y python-software-properties python g++ make
      sudo add-apt-repository -y ppa:chris-lea/node.js
      sudo apt-get update
      sudo apt-get install -y nodejs
    fi
  SCRIPT
    config.vm.provision "shell", inline: $install_node

    # Install dependency on `git`
    $install_git = <<SCRIPT
    if ! which git &> /dev/null; then
      sudo apt-get install git -y
    fi
  SCRIPT
    config.vm.provision "shell", inline: $install_git

    # Clone `npm-www` repository
    $clone_repository = <<SCRIPT
    cd /vagrant
    if ! test -d npm-www &> /dev/null; then
      git clone https://github.com/npm/npm-www.git
      cd npm-www
      npm install
    fi
  SCRIPT
    config.vm.provision "shell", inline: $clone_repository
end
