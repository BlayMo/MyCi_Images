#MyCi_Images#

Sencilla y simple aplicación desarrollada con PHP 7.1.6. + Codeigniter 3.1.6 bajo el patrón HMVC para la gestión de imágenes realizadas con ocasión de un evento social.

El acceso es de caracter privado, de tal forma que solo los usuarios autorizados pueden acceder a su contenido.

Para la gestión de usuarios he utilizado la libreria [Codeigniter Ion-Auth](http://benedmunds.com/ion_auth/ "").


Las tablas para crear la BD se encuentran en "myci_images.sql".

He creado tres niveles de acceso:
> Administrador:
                email: **admin@admin.com**  password: **password**.
                
> Anfitriones:  email: **propietarios@mail.com** password: **12345678**.

> Invitados:    email: **invitados@mail.com** password:**12345678**. 

Solo los pertenecientes al grupo "admin" tienen acceso al backend de la palicación.

Solo los pertenecientes a los grupos "admin" y "anfitriones" pueden descargar, editar y borrar imágenes.

Todos los usuarios logeados puedes subir sus imágenes para comportir con otros usuarios.

El sofware de terceros empleado es el que figura en "composer.json" y se distribuye con sus respectivas licencias.

La aplicación se distribuye bajo licencia MIT.

Agradezco cualquier comentario y/o sugerencia en [ExpresoWeb](expresoweb2015@gmail.com "").

Diciembre de 2017.



 