<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
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

## Configuración

- Renombrar el `env` por `.env`
- Definir la variable de entorno a `development`
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