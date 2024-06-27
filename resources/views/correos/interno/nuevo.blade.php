@component('mail::message')

Buen día,

Hemos recibido una nueva solicitud de soporte con el folio **{{ $datos->folio }}**.

Detalles de la Solicitud:

Descripción del Soporte: **{{$datos->comentarioPadre()}}**

Estatus: **{{ $datos->estatus->nombre }}**

Fecha de Solicitud: **{{ $datos->comentario->created_at }}**

Comentarios Iniciales:
**{{ $datos->comentario->comentario }}**

Puede revisar los detalles completos de su solicitud de soporte y realizar un seguimiento de su progreso accediendo a nuestra aplicación en el siguiente enlace: [aplicación de soporte](https://itsupport.tiii.mx/).

Gracias por confiar en nuestro servicio de soporte. Si tiene alguna pregunta o necesita más información, no dude en contactarnos.

Atentamente,

{{ config('app.name') }}
@endcomponent