@component('mail::message')

Buen día,

Nos complace informar que el estatus de soporte con el folio **{{ $datos->folio }}** ha cambiado.

Detalles del Cambio:

Descripción del Soporte: **{{$datos->comentarioPadre()}}**

Nuevo Estatus: **{{ $datos->estatus->nombre }}**

Fecha del Cambio: **{{ $datos->comentario->created_at }}**

Comentarios Adicionales:
**{{ $datos->comentario->comentario }}**

Puede revisar los detalles completos de su solicitud de soporte y realizar un seguimiento de su progreso accediendo a nuestra aplicación en el siguiente enlace: [aplicación de soporte](https://itsupport.tiii.mx/).

Gracias por su paciencia y confianza en nuestro servicio. Si tiene alguna pregunta o necesita más información, no dude en ponerse en contacto con nuestro equipo de soporte.

Atentamente,

{{ config('app.name') }}
@endcomponent