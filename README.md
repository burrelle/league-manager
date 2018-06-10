# League Manager Final Project - CS496  
Server requirements per Laravel Documentation:  
```
PHP >= 7.1.3
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension
Ctype PHP Extension
JSON PHP Extension
Composer
```
Install dependencies:
```
composer install
```
Create a database:  
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
Create environmental variable for Google API:
```
GOOGLE_CLIENT_ID=googleClientID
GOOGLE_CLIENT_SECRET=googleClientSecret
```
Seed the database:  
```
php artisan migrate:refresh --seed
```
Generate application key:  
```
php artisan key:generate
```
Serve the application:  
```
php artisan serve
```
In a new tab:  
```
npm run dev
```
To run test suite:  
```
npm install
npm test
```
