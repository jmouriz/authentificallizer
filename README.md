# AngularJS Satellizer Demo

Este repositorio contiene un ejemplo completo y funcional de cómo usar [Satellizer](https://github.com/sahat/satellizer) en tu sitio, incluyendo el código del lado del servidor.

## Importante

Leé el instructivo hasta el final y sólo prueba cuando hayas terminado de configurar todos los proveedores para evitarte dolores de cabeza. Asegúrate de configurar correctamente todas las URL de redirección. Yahoo no soporta localhost y tampoco permite múltiples URLs de redireccionamiento con lo cual deberás crear dos aplicaciones, una para producción y otra para desarrollo usando la dirección 127.0.0.1 en lugar del nombre localhost. Asegúrate de usar siempre el protocolo cifrado HTTPS.

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

1. Copiar authorization/common/config-template.php a authorization/common/config.php. 
2. Ve a la dirección http://localhost/satellizer-full-stack-demo/setup.php para crear la base de datos.
3. Configurar los proveedores con los valores devueltos en el paso anterior.
