# Plugin "Cursos" para Moodle 4.1

- El plugin "Cursos" proporciona un webservice personalizado para Moodle 4.1 que permite a los usuarios obtener una lista paginada de cursos.


## Características

- Obtener una lista de cursos con soporte para paginación.
- Parámetros personalizables para definir el número de página y la cantidad de cursos por página.
- Retorno de información detallada de cada curso, incluyendo:
    - ID
    - Nombre completo
    - Nombre corto
    - Resumen (con etiquetas HTML eliminadas)
    - Fecha de inicio
    - Fecha de finalización
    - Categoría (nombre de la categoría o ID si no tiene nombre)


## Instalación

1. Descarga el código fuente del plugin.
2. Copia la carpeta del plugin en la carpeta local/ de tu instalación de Moodle.
3. Ingresa a tu sitio Moodle como administrador.
4. Navega a Administración del sitio > Notificaciones para instalar el plugin.
5. Sigue las instrucciones en pantalla para completar la instalación.

## Uso

Para utilizar el webservice personalizado:

1. Asegúrate de tener habilitados los webservices en Administración del sitio > Plugins > Webservices > Resumen.
2. Crea un usuario o utiliza uno existente para acceder al webservice.
3. Asigna el rol adecuado al usuario para permitirle acceder al webservice.
4. Crea un token para el usuario en Administración del sitio > Plugins > Webservices > Gestionar tokens.
5. Utiliza el token para hacer solicitudes al webservice.

Ejemplo de solicitud:
https://YOUR_MOODLE_URL/webservice/rest/server.php?wstoken=YOUR_TOKEN&wsfunction=local_cursos_get_courses&page=1&per_page=10

Solicitud que use para la prueba:
http://localhost/moodle/webservice/rest/server.php?wstoken=MY_TOKEN&wsfunction=local_cursos_get_courses&moodlewsrestformat=json&page=1&per_page=10

## Notas adicionales

- El plugin ha sido desarrollado siguiendo las mejores prácticas y recomendaciones de seguridad de Moodle.
- El plugin esta totalmente documentado en el archivo "docs.pdf" y el seguimiento de cambios esta publico en Trello: https://trello.com/b/dVUK1pnM/buendata
