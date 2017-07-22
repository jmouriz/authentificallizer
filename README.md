# Authentificallizer

Este repositorio contiene un ejemplo completo y funcional de cómo usar [Satellizer](https://github.com/sahat/satellizer) para iniciar sesión usando OAuth 2.0 con diversos proveedores en tu sitio y recibir información del perfil del usuario. Incluye el código del lado del servidor para enlazar con tus usuarios y un servidor OAuth 2.0 propio.

![screenshot](https://jmouriz.github.io/resources/images/screenshots/authentificallizer-1.png "Screenshot")

![screenshot](https://jmouriz.github.io/resources/images/screenshots/authentificallizer-2.png "Screenshot")

![screenshot](https://jmouriz.github.io/resources/images/screenshots/authentificallizer-3.png "Screenshot")

![screenshot](https://jmouriz.github.io/resources/images/screenshots/authentificallizer-4.png "Screenshot")

![screenshot](https://jmouriz.github.io/resources/images/screenshots/authentificallizer-5.png "Screenshot")

## Importante

Leé el instructivo hasta el final y sólo prueba cuando hayas terminado de configurar los proveedores que vas a utilizar para evitarte dolores de cabeza. Asegúrate de configurar correctamente todas las URL de redirección.

Yahoo no soporta localhost y tampoco permite múltiples URLs de redireccionamiento con lo cual deberás crear dos aplicaciones, una para producción y otra para desarrollo usando la dirección 127.0.0.1 en lugar del nombre localhost. Asegúrate de usar siempre el protocolo cifrado HTTPS.

## Requerimientos previos

1. bower
2. composer

## Instalación

```
bower install
cd authorization/libraries
composer install
```

## Configuración

1. Copia authorization/common/config-template.php a authorization/common/config.php y edita este último con los valores de configuración para cada proveedor.
2. Ve a la dirección http://localhost/satellizer-full-stack-demo/setup.php para crear la base de datos y configura la URL de redirección en cada proveedor.
