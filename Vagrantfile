Vagrant.configure(2) do |config|
	config.vm.box = "ubuntu/trusty64"
	config.vm.network "forwarded_port", guest: 80, host: 8080, auto_correct: true
	config.vm.network "private_network", ip: "10.10.10.10"
	config.vm.synced_folder "./site", "/home/vagrant/site",owner: "vagrant", group: "www-data", mount_options: ["dmode=775,fmode=664"]

	config.vm.provider "virtualbox" do |vb|
		vb.gui = false
		vb.memory = "1024"
	end

	config.vm.provision "shell", path: "Vagrantprovision.sh"
end