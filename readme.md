<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Sobre el sistema

Software educativo para el area de redes, dicho software cumple con los requisitos para impartir clases a travez de temas publicados, asi como evaluaciones.

## Instalacion del sistema

- [1-Copiar el proyecto en tu carpeta 'wwww' o 'htdocs'.](#).
- [2-Abrir la consola de comandos en la raiz del proyecto.](#).
- [3-Copiar el archivo .env.example y cambiar su nombre a .env, Si usas linux con "cp .env.example .env" y en windows "copy .env.example .env",abrir el archivo .env y configurar el nombre y contraseña de la base de datos.](#).
- [4-En la consola de comandos escribir 'composer install' y esperar que se termine el proceso.](#).
- [5-En la consola escribir 'php artisan key:generate'.](#).
- [6-Ahora escribir 'php artisan migrate --seed' y esperar a que termine el proceso.](#).
- [7-Tambien escribir 'php artisan vendor:publish' para tener acceso al storage, esperar que termine el proceso.](#).
- [8-Solo queda escribir 'php artisan serve', aparecera algo como 'Laravel development server started: http://127.0.0.1:8000', ingresa a la direccion y listo, el sistema ya debe estar corriendo.](http://127.0.0.1:8000).