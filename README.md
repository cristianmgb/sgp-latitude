<p align="center">
	<a href="https://lattitude.co/" target="_blank">
		<img src="https://mlcrrsavqvrs.i.optimole.com/1gxDIR8--KmHYQzM/w:auto/h:auto/q:82/https://lattitude.co/contenido/wp-content/uploads/2020/06/logo.svg" width="400">
	</a>
</p>

## Clonación vía SSH o HTTPS

```bash
[clonar SSH]$ git clone git@github.com:cristianmgb/sgp-latitude.git
```
```bash
[clonar HTTPS]$ git clone https://github.com/cristianmgb/sgp-latitude.git
```

## Instalación de dependencias

Para dependencias propias del framework y de PHP, ejecutar:
```bash
$ composer install
```

Para dependencias de Javascript, ejecutar:
```bash
$ npm install
```

## Compilación Js

Para compilar los recursos javascript, ejecute:
```
$ npm run dev
```
## Configuración de la Base de datos

Seguido a los pasos anteriores configurar los parametros de la base de datos:

```
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

## Configuración del .Env

- Renombrar el `env` por `.env`
- Definir el `APP_URL` al nombre de tu proyecto.
- Ejecutar `php artisan key:generate`
- Ejecutar `php artisan migrate --seed`
- Ejecutar `php artisan optimize:clear`

## Datos de Usuarios

Una vez configurada la base de datos y ejecutados los comandos para las migraciones
y seeders previos del sistema, estas serían las credenciales para los usuarios del
sistema con susrespectivos roles y permisos ya asignados:

```
Superadministador
- User: superadmin@latittude.com
- Pass: secret

Administrador
- User: admin@latittude.com
- Pass: secret

Asociado
- User: asociado@latittude.com
- Pass: secret
```