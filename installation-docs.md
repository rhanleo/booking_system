
# 1). Installation
#    - create Prefered DB name
#    - config .env file  based on DB cred
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=DB_NAME
        DB_USERNAME=DB_USERNAME
        DB_PASSWORD=DB_PASSWORD
      
# 2). - Open terminal go to root folder and run migration script
        php artisan migrate

<?php  
#      - Using Local server i.e. ( wampp,xampp)
#  3). - On your terminal run 
        php artisan serve 
        Now can the local host url: http://127.0.0.1:8000/ 



# 4). You will able to register admin using this url
        http://127.0.0.1:8000/admin/create


  
#  5). Now you can login as admin this url
        http://127.0.0.1:8000/admin



