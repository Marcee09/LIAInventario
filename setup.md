El setup de contenedores de docker se encuentra en el archivo docker-compose.yml para el ambiente local y en el archivo docker-compose.prod.yml para el ambiente de producción.

Este setup se basa en la configuración descripta en:

https://github.com/aschmelyun/docker-compose-laravel

### Local
Para crear los contenedores de docker para trabajo local se debe ejecutar el siguiente comando:

```bash
$ sudo docker compose -f docker-compose.yml up -d --build app
```

1. Instalar las dependencias de composer:

```bash
$ sudo docker compose run --rm composer update
```
2. Ejecutar las migraciones de la base de datos:

```bash
$ sudo docker compose run --rm artisan migrate
```

3. Ejecutar los seeders de la base de datos:

```bash
$ sudo docker compose run --rm artisan db:seed
```

4. Verificar que los usuarios se hayan creado correctamente:

```bash
$ sudo docker compose run --rm artisan users
```

5. Generar la llave de encriptación de la aplicación:

```bash
$ sudo docker compose run --rm artisan key:generate
```

6. Probar que el api/ping responda correctamente:

```bash
$ curl -X GET http://damogame.com/api/ping
$ {"pong":true}
```