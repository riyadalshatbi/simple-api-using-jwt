# simple-api-using-jwt
Simple api token using Laravel-9 with JWT package

# How to Run API :
1- Download project Folder
2- Extract files
3- Go to root path in project folder
4- Run this command : composer install
5- Create .env file
6- Create Database and set database name in .env file
7- Run this command : php artisan migrate
8- Run this command : php artisan db:seed
9- Run this command : php artisan jwt:secret
10- After excuede <php artisan jwt:secret> : take jwt-auth secret value that will get it and put it in env file. Ex :
     <JWT_SECRET = JWT SECRET value >
11- Add API password in env file : 
     <API_PASSWORD = 123456>
