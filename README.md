#Tennis Championship

###Requisitos
- php7.3
- mysql

###Pasos de instalación:
1. Clonar el repositorio
2. Crear schema en la base de datos
3. Configurar nuestro .env a partir del .env.example
    1. En DB_DATABASE= poner el nombre del schema creado
    2. En DB_USERNAME= poner nuestro usuario de mysql (por defecto es root)
    3. En DB_PASSWORD= poner nuestra clave de usuario de mysql (por defecto no tiene)
4. Ejecutar el comando 'composer install'
5. Ejecutar el comando 'php artisan key:generate'
6. Ejecutar: php artisan migrate
7. Ejecutar: php artisan db:seed --class=PlayersTableSeeder
11. Ejecutar el comando 'php artisan serve'
12. La app se estará ejecutando en http://localhost:8000 
