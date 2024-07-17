<h1 align="center">PIB Data Santri</h1>

---

## Installation

- Clone the repository
``` 
git clone https://github.com/gertoy837/DataSantri`
cd DataSantri
```
- Install dependencies
```
composer install
```
- Create a new database and copy the .env.example file to .env
```
cp .env.example .env
```
- Update the .env file with your database credentials
- Run the migration files
```
php artisan migrate
```
- Generate a new application key
```
php artisan key:generate
```
- Run the application
```
php artisan serve
```
- Visit the application on your browser
```
http://localhost:8000
```
- Login with the default credentials
