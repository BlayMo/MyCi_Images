# MyCi_Images
Repositorio web de imágenes de caracter privado. Realizado con PHP 7.1.6 + Codeigniter 3.1.6.

Simple y sencilla aplicación desarrollada bajo el patrón HMVC como repositorio privado de fotos. Es ideal para compartir fotografias realizadas con ocasión de algún evento social.

He utilizado la libreria Codeigniter-Ion-Auth http://benedmunds.com/ion_auth/ para la gestión de usuarios y control de acceso.
Existen tres niveles de acceso:
1 - Administrador:  email:    admin@admin.com
                    password: password
                   
2 - Anfitriones:   email: porpietarios@mail.com
                   password: 12345678
                   
3 - Invitados:     email: invitados@mail.com
                   password: 12345678   
                   
La aplicacion permite a todos los usuarios logeados subir fotos al portal para compartir con otros usuarios.
Solo los pertenecientes al grupo de administradores y anfitriones pueden borrar, descargar y/o editar fotos.

Las tablas para crear la BD se encuentran en "myci_images.sql".

