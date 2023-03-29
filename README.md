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

###Aclaraciones
1. Se proporciona el archivo tennis_championship.yaml para importar en swagger. https://editor.swagger.io/
2. Logica usada para la suerte. Se hace un random entre 1 y 2, si toca 1 el jugador con suerte es el 1, si no el 2. Se hace un random de 1 a 100, ese numero es sumado al total de sus estadisticas. 
3. El jugador ganador es el de mayor estadísticas.
4. No se pueden realizar torneos mixtos.
5. La cantidad de jugadores por torneo es 2 elevado a la cantidad de rondas. 
