# League Manager Final Project - CS496  
To start create a database:  
```
touch database/database.sqlite
```
Set the .env file:  
```
cp .env.example .env
```
Point the environmental variable for SQLite:   
```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database
```
Seed the database:  
```
php artisan migrate:refresh --seed
```
Serve the application:  
```
php artisan serve
```
Run test suite:  
```
npm install
npm test
```