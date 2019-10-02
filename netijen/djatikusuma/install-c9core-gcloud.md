# INSTALL C9.IO CORE GOOGLE CLOUD

## Install git
```
sudo apt update
sudo apt install git
```

# Install PHP
```
apt-cache pkgnames | grep php7.2
sudo apt-get install php -y
sudo apt-get install php-{bcmath,bz2,intl,gd,mbstring,mysql,zip,fpm} -y
```

# Install Node
```
curl -sL https://raw.githubusercontent.com/creationix/nvm/v0.33.11/install.sh -o install_nvm.sh
bash install_nvm.sh
source ~/.profile
nvm install 12.10.0
nvm use 12.10.0
```

# Install Python
```
sudo apt install python-minimal
```

# Install c9.io SDK
```
git clone https://github.com/c9/core.git c9sdk
cd c9sdk
sudo apt-get install build-essential
scripts/install-sdk.sh
```

# Untuk menjalankan
```
node server.js -w {direktorinya} -a : -l 0.0.0.0 -p 5050
```

{direktorinya} : /home/username/project/
