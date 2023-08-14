Instalación
Clonar el repositorio

[git clone https://github.com/1-Aleja/crud.git](https://github.com/1-Aleja/GeolocalizationBack.git)

Cambiar al directorio del proyecto

cd GeolocalizationBack

Instalar las dependencias usando composer

composer install

Generar los ficheros 'autoload' cargando las clases agregadas

composer dump-autoload
Copiar el archivo env de ejemplo y realice los cambios de configuración necesarios en el archivo .env (definir la conexión a la base de datos)

cp .env.example .env
Generar una nueva clave de aplicación

php artisan key:generate
Ejecutar migraciones de base de datos

php artisan migrate
Crear enlace simbólico para acceder a los archivos de la carpeta storage desde public

Ejecutar los header para migrar la data de prueba a la Base de datos
php artisan db:seed

-Realizar inserts

Iniciar el servidor de desarrollo local.

php artisan serve
Ahora puede acceder al servidor en http://localhost:8000 realizando login con los datos de acceso por defecto del usuario administrador.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# GeolocalizationBack
