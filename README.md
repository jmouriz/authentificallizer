# AngularJS Satellizer Demo

Este repositorio contiene un ejemplo completo y funcional de cómo usar [Satellizer]: https://github.com/sahat/satellizer en tu sitio, incluyendo el código del lado del servidor.

## Importante

Leé el instructivo hasta el final y sólo prueba cuando hayas terminado de configurar todos los proveedores para evitarte dolores de cabeza. Asegúrate de configurar correctamente todas las URL de redirección. Yahoo no soporta localhost y tampoco permite múltiples URLs de redireccionamiento con lo cual deberás crear dos aplicaciones, una para producción y otra para desarrollo usando la dirección 127.0.0.1 en lugar del nombre localhost. Asegúrate de usar siempre el protocolo cifrado HTTPS.

## Requerimientos previos

1. bower
2. composer

## Instalación

bower install
cd authorization/libraries
composer install

## Configuración

Editar los valores de configuración del archivo authorization/common/config.php

## Configuración de los proveedores

Los valores de configuración (google|yahoo|microsoft|facebook)-authorization-provider contienen la URL de redirección que se debe configurar en el panel de desarrollador de cada proveedor.

* Google: https://console.cloud.google.com/
* Yahoo: https://developer.yahoo.com/
* Microsoft: https://apps.dev.microsoft.com/
* Facebook: https://developers.facebook.com/
