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


## Instalación (Con acceso de Desarrollador)

1. Descarga el código fuente del plugin.
2. Copia la carpeta del plugin en la carpeta local/ de tu instalación de Moodle.
3. Ingresa a tu sitio Moodle como administrador.
4. Navega a Administración del sitio > Notificaciones para instalar el plugin.
5. Sigue las instrucciones en pantalla para completar la instalación.

## Instalación Estándar

1. Descarga del Plugin: Descarga el archivo ZIP del plugin (Code > Download ZIP)
2. Accede a tu sitio Moodle: Inicia sesión en tu sitio Moodle con una cuenta de administrador.
3. Instalación del Plugin:
    - Ve a Administración del sitio > Extensiones > Instalar complementos.
    - Haz clic en el botón Elegir un archivo y selecciona el archivo ZIP que descargaste en el primer paso.
    - Haz clic en Instalar plugin del archivo ZIP.
    - Sigue las instrucciones en pantalla para completar la instalación.
4. Configuración: No es necesario realizar configuraciones adicionales para este plugin.

## Uso

Para utilizar el webservice personalizado:

1. Asegúrate de tener habilitados los webservices en Administración del sitio > Servidor > Servicios Web > Habilitar Servicios Web.
2. Crea un usuario o utiliza uno existente para acceder al webservice.
3. Asigna el rol adecuado al usuario para permitirle acceder al webservice.
4. Crea un token para el usuario en Administración del sitio > Servidor > Servicios Web > Crear ficha (token) para un usuario.
5. Utiliza el token para hacer solicitudes al webservice.

Ejemplo de solicitud:
https://YOUR_MOODLE_URL/webservice/rest/server.php?wstoken=YOUR_TOKEN&wsfunction=local_cursos_get_courses&page=1&per_page=10

Solicitud que use para la prueba:
http://localhost/moodle/webservice/rest/server.php?wstoken=MY_TOKEN&wsfunction=local_cursos_get_courses&moodlewsrestformat=json&page=1&per_page=10

6. Para visualizar el resultado del evento "course_list_viewed" Administración del sitio > Informes > Registros y podrás visualizar 
quien consulto la lista de cursos por medio del webservice

Ejemplo del resultado del evento "course_list_view:
The user with id '2' viewed the course list.

## Notas adicionales

- El plugin ha sido desarrollado siguiendo las mejores prácticas y recomendaciones de seguridad de Moodle.
- El plugin esta totalmente documentado en el archivo "docs.pdf" y el seguimiento de cambios esta publico en Trello: https://trello.com/b/dVUK1pnM/buendata
- Primera revisión del plugin (30/10/2023) fue corregido: README.md y external.php adcionalmente fue implementado un nuevo evento: course_list_viewed 
