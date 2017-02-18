# SpiceUp 

### Installation
```bash
git clone git@github.com:FridayLabs/SpiceUp.git
cd SpiceUp
composer install
yarn
```

### Fill db
 Adjust your .env file to fit your db settings
```bash
mysql -uroot -proot -e 'create database spiceup'
php artisan migrate --seed
```