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
php artisan migrate:refresh --seed (refresh exist db)
```

### Run docker-compose enviroment
```bash
cd ./docker/
docker-composer up -d nginx mysql
```
Add to /etc/hosts IP_DOCKER spiceup.local

And go to http://spiceup.local

TODO: run migrate from workspace container