# magarticles
## Introduction
magArticles is a an axample Laravel 5 project for the Classes of Web Technologies in COMSATS Lahore Campus by Muhammad Usman Akram
## Installation
Clone this git Repository in your Computer and open the command prompt and go to your location e.g. if you have downloaded in 'F:/magarticles' then 

    cd F:/magarticles 
    f:
    composer install
After installing, rename '.env.example' to '.env' and CACHE_DRIVER should be set to array, fill out your database credentials and run following command

    php artisan migrate:refresh --seed 
    php artisan serve
Now you can access your project at localhost:8000 

    username: admin@admin.com
    password: admin
## Commands Available 
Apart from usual php artisan commands you can try following 

    php artisan make:view Tag
    php artisan make:view Tag -f backend
    Tag is the model name and backend is the folder which you want to use to create views inside. 
    e.g. -f backend.admin would create views inside backend\admin\tags folder
### Pre Requisites
php and composer should be installed and setup in path variables.
## Contact Me
 You can contact me at 'musmanakram at ciitlahore dot edu dot pk' or at http://www.usman-blog.com 
 
 Demo available at http://articles.usman-blog.com 
 
 
 
