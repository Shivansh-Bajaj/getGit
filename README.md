# getGit
application to search github users on from input email, name or skill(languages).    
url: https://getgituser.herokuapp.com  
## Github API  
Application fetch data from github user api with name, email and language as parameters.  
api url: https://api.github.com/users?q={input name,email}+language={input language}.  
for more information about api refer to https://developer.github.com/v3/users/  
## Steps to build:  
1.) install php7.0  
2.) dependencies: sudo apt install php7.0-mcrypt php7.0-gd php7.0-mbstring  
3.) install composer using  
  curl -sS https://getcomposer.org/installer | php  
4.) composer global require "laravel/installer"  
5.) git clone https://github.com/jamesthechamp/getGit.git  
6.) composer install  
7.) run server:  
  php artisan serve  
8.) your server is running at http://127.0.0.1:8000  
Enjoy :)  
