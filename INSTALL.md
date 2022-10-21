Instalacion

instalacion de apache2:

                    sudo apt install apache2
                    sudo apt install apache2-utils
                    sudo ufw enable
                    sudo ufw allow 80/tcp comment 'accept Apache'
                    sudo ufw allow 443/tcp comment 'accept HTTPS connections'
                    sudo ufw allow 25/tcp comment 'accept Mail'

instalacion de postgres:

                    sudo apt install postgresql 
                    sudo apt install postgresql-contrib
                    

instalacion de php:

                    sudo apt install php
                    sudo apt install php-pgsql
                    sudo apt install php-zip
                    


                    
coloque el repositorio en /var/ww/html, si no tiene acceso cambie los permisos de acceso de la carpeta:

                    sudo chown -R www-data:www-data /var/www/html     
                    sudo chmod -R 777 /var/www/html

con todo instalado:
entramos a postgres, creamos un usuario y una base de datos. 
                  
                    pslq postgres
                    create user juan with password 'juan' createdb;
                    create database biblioteca;
                    grant all privileges on database biblioteca to juan;
                    
 salimos con Ctrl^z  y entramos con
  
                    psql biblioteca juan
                
 con \i y la direccion del archivo creamos las tablas y las funciones
                    
                    \i /var/www/html/Biblioteca-CeReGeo/postgresql/script.sql
                    \i /var/www/html/Biblioteca-CeReGeo/postgresql/funciones.sql
                    \i /var/www/html/Biblioteca-CeReGeo/postgresql/trigger.sql

ahora hay que cambiar el archivo de configuración
en la carpeta accesos en el archivo conectserver.php estan las variables para poder acceder al servidor
    
                  $server es la direccion del servidor
                  $basedatos es el nombre de la base de datos creada en los pasos anteriores
                  $usuario es el nombre de usuario creado en los pasos anteriores
                  $contra es la contraseña del usuario creado en los pasos anteriores
fin
         
          
 cambios en php.ini
 
                  max_execution_time 36000
                  max_input_time 60
                  upload_max_filesize 2000M
                  post_max_size 2000M

                  smtp= servidor de correo ejemplo: smtp.gmail.com
                  smtp_port=25
                    
                  
