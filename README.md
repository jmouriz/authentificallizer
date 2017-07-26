# Authentificallizer

Este repositorio contiene un ejemplo completo y funcional de cómo usar [Satellizer](https://github.com/sahat/satellizer) para iniciar sesión usando un servidor local OAuth 2.0 ([RFC 6749: The OAuth 2.0 Authorization Framework](https://tools.ietf.org/html/rfc6749)) y diversos proveedores externos en tu sitio. Incluye el código del lado del servidor para enlazar con tus usuarios y un servidor OAuth 2.0 propio que soporta múltiples `scopes` ([RFC 6749: The OAuth 2.0 Authorization Framework, 3.3. Access Token Scope](https://tools.ietf.org/html/rfc6749#section-3.3)).

# Pantallazos

![screenshot](https://jmouriz.github.io/resources/images/screenshots/authentificallizer-1.png)

![screenshot](https://jmouriz.github.io/resources/images/screenshots/authentificallizer-2.png)

![screenshot](https://jmouriz.github.io/resources/images/screenshots/authentificallizer-3.png)

![screenshot](https://jmouriz.github.io/resources/images/screenshots/authentificallizer-4.png)

![screenshot](https://jmouriz.github.io/resources/images/screenshots/authentificallizer-5.png)

![screenshot](https://jmouriz.github.io/resources/images/screenshots/authentificallizer-6.png)

## Usuarios

Los usuarios se encuentran en la tabla `oauth_users` definida en `database/schema.sql`. Puedes ampliarla a tu gusto pero no modifiques los campos existentes porque es usada internamente por la biblioteca [oauth2-server-php](https://github.com/bshaffer/oauth2-server-php) para el `grant_type` `password` ([RFC 6749: The OAuth 2.0 Authorization Framework, 1.3.3. Resource Owner Password Credentials](https://tools.ietf.org/html/rfc6749#section-1.3.3)). Las llamadas SQL se encuentran en `authorization/model/user.php` que es una clase que extiende un pequeño ORM muy simple que está en `authorization/common/model.php`.

## Importante

Leé el instructivo hasta el final y sólo prueba cuando hayas terminado de configurar los proveedores que vas a utilizar para evitarte dolores de cabeza. Asegúrate de configurar correctamente todas las URL de redirección.

Yahoo no soporta `localhost` y tampoco permite múltiples URLs de redireccionamiento con lo cual deberás crear dos aplicaciones, una para producción y otra para desarrollo usando la dirección `127.0.0.1` en lugar del nombre `localhost`. Asegúrate de usar siempre el protocolo cifrado HTTPS.

## Requerimientos previos

1. bower
2. composer

## Dependencias adicionales

PHP debe soportar la extensión PDO.

## Instalación

```
bower install
cd authorization/libraries
composer install
```

## Configuración

1. Copia `authorization/common/config-template.php` a `authorization/common/config.php` y edita este último con los valores de configuración para cada proveedor y los datos de acceso a tú base de datos.
2. Ve a la dirección `http://localhost/authentificallizer/setup.php` para crear el esquema de tablas en la base de datos y configura la URL de redirección en cada proveedor.

## Pendientes

1. Agregar más proveedores.
2. Permitir la instalación del lado del servidor con Composer.
3. Hacer un módulo para AngularJS y permitir la instalación del lado del cliente con Bower o NPM.
