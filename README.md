# Starter-ci-boilerplate

## ¿Qué es CodeIgniter?

CodeIgniter es un marco web PHP de pila completa que es ligero, rápido, flexible y seguro.

- Sitio oficial          : [Sitio oficial](http://codeigniter.com).
- Repositorio oficial    : [Repositorio](https://github.com/codeigniter4/CodeIgniter4).
- Guía de usuario oficial: [Aquí](https://codeigniter4.github.io/userguide/). 

## Instalación y actualizaciones

```bash
[clonar SSH]$ git clone git@gitlab.com:cihispano.org/starter-ci-boilerplate.git
```
Ó
```bash
[clonar HTTPS]$ git clone https://gitlab.com/cihispano.org/starter-ci-boilerplate.git
```
```bash
$ composer install
```
```bash
$ npm install
$ npm run build:deb
```

## Configuración

- Renombrar el `env` por `.env`
- Definir la variable `CI_ENVIRONMENT` a `development`
- Definir el `app.baseURL` al nombre de tu proyecto. Ejemplo 'http://localhost/starter-ci-boilerplate/public'. En caso de utilizar __Docker__, debe asignarle el valor https://localhost.

### Configuración Docker

Para iniciar con una configuración por defecto de Docker, ha de copiar el archivo `docker/web.env.example` a `docker/web.env`.

Para generar la imagen del servidor web, desde la carpeta `docker` del proyecto debe ejecutar el script de bash:

```bash
$ ./build-all.sh
```

O en la consola y dentro de la carpeta `docker`, el comando:
```bash
$ docker build -t starter:web -f Dockerfile-web .
```

Una vez haya generado la imagen, puede iniciar los servicios con el comando:

```bash
$ docker-compose up 
```

O para que una vez iniciado, vuelva al prompt:

```bash
$ docker-compose up -d
```

Para detener los servicios, puede hacerlo con el comando:

```bash
$ docker-compose down
```

O `ctrl+c` en caso de no haber iniciado con el parámetro `-d`

## Requerimientos del Servidor

Se requiere PHP versión 7.2 o superior, con las siguientes extensiones instaladas: 

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Además, asegúrese de que las siguientes extensiones estén habilitadas en su PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)