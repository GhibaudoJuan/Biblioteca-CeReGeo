Instalacion

instalacion de apache2:

                    sudo apt install apache2
                    sudo apt install apache2-utils
                    sudo ufw enable
                    sudo ufw allow 80/tcp comment 'accept Apache'
                    sudo ufw allow 443/tcp comment 'accept HTTPS connections'

instalacion de postgres:

                    sudo apt install postgresql 
                    sudo apt install postgresql-contrib
                    

instalacion de php:

                    sudo apt install php
                    sudo apt install php-pgsql

instalacion de git:

                    sudo apt install git
                    
una ves instalado git coloque el repositorio en /var/ww/html, si no tiene acceso cambie los permisos de acceso de la carpeta:

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
                    
fin
                    
 

                    
                  
