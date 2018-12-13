### Aplicacion "Appetito24"
Proyecto Presentado para la materia de Taller de Sistemas.
Docente: <a href="https://github.com/ernestomar">Ing. Ernesto Omar Campohermoso Alcon</a>

OBJETIVO DE LA APLICACION:
	Aplicacion diseñada para las personas que desean poder recibir los ingredientes de sus alimentos en sus domicilios.


##Tags:
- v0.0.2: Version donde estan mas campos pero faltan arrreglos minimos
- v0.0.1: Version donde sirve el login y el registro por defecto de Laravel.

#Aclaraciones:
- Solo se usara el master, por recomendacion del Ing. Campohermoso

- Por recomendacion del ingenieror realizar los siguientes pasos:

<ol>
<li>Hacer un PULL de este repositorio</li>
<li>Hacer tus commits locales todo lo que quieras</li>
<li>Hacer un PULL para obtener los ultimos cambios OTRA VEZ</li>
<li>RECIEN Y SOLO RECIEN hacer el PUSH de los cambios realizados por cada persona</li>
</ol>

#Requisitos para el funcionamiento del sistema:

Comandos requeridos en caso de fallas:

Cuando no reconozco un seeder:
>$ composer dump-autoload

Cuando se desee realizar los seeders y migrates al mismo tiempo:
>$ php artisan migrate:fresh --seed

#Componentes extras para el funcionamiento del sistema:

Realizar los siguientes comandos: 

>$ apt-get install php-gd
>$ apt-get install php-curl

Para el funcionamiento del Codigo QR:
>$ composer require werneckbh/laravel-qr-code

Para el funcionamiento del generador de PDF:
Se requiere instalar la librería del PDF:
>$ composer require dompdf/dompdf
