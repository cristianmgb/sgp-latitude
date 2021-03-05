<p align="center">
	<a href="https://lattitude.co/" target="_blank">
		<img src="https://mlcrrsavqvrs.i.optimole.com/1gxDIR8--KmHYQzM/w:auto/h:auto/q:82/https://lattitude.co/contenido/wp-content/uploads/2020/06/logo.svg" width="400">
	</a>
</p>

## Instalación y actualizaciones

```bash
[clonar SSH]$ git clone git@github.com:cristianmgb/sgp-latitude.git
```
Ó
```bash
[clonar HTTPS]$ git clone https://github.com/cristianmgb/sgp-latitude.git
```
```bash
$ composer install
```
```bash
$ npm install
$ npm run dev
```
## Configuración de la Base de datos

Seguido a los pasos anteriores configurar los parametros de la base de datos:

```
DB_HOST=
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

```

## Configuración

- Renombrar el `env` por `.env`
- Definir el `APP_URL` al nombre de tu proyecto.
- ejecutar `php artisan key:generate`
- Ejecutar `php artisan migrate --seed`
- Ejecutar `php artisan optimize:clear`

## Datos de Usuarios

El único usuariocon permisos asignados es el `Superadministrador` una vez logueado este debe asiganr los permisos que requieran los otros dos roles del sistema aquí los datos de cada usario:

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