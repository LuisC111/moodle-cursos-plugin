<?php
// Asegura que el script no sea accedido directamente.
defined('MOODLE_INTERNAL') || die();

// Importa la biblioteca externa de Moodle.
require_once($CFG->libdir . "/externallib.php");

/**
 * Clase que proporciona funciones externas para obtener cursos.
 */
class local_cursos_external extends external_api {

    /**
     * Define los parámetros para la función get_courses.
     * 
     * @return external_function_parameters
     */
    public static function get_courses_parameters() {
        return new external_function_parameters(
            array(
                'page' => new external_value(PARAM_INT, 'Número de página que se desea obtener', VALUE_DEFAULT, 1),
                'per_page' => new external_value(PARAM_INT, 'Cantidad de cursos por página', VALUE_DEFAULT, 10)
            )
        );
    }
    
    /**
     * Obtiene una lista paginada de cursos.
     * 
     * @param int $page Número de página.
     * @param int $per_page Cantidad de cursos por página.
     * @return array
     */
    public static function get_courses($page, $per_page) {
        global $DB;

        // Validación: Verifica si page o per_page no son números enteros o son negativos.
        if (!is_int($page) || !is_int($per_page) || $page < 0 || $per_page < 0) {
            throw new invalid_parameter_exception('Detectado valor de parámetro no válido.');
        }   
        // Validar contexto.
        $context = context_system::instance();
        self::validate_context($context);
    
        // Obtener el total de cursos.
        $total = $DB->count_records('course');

        // Si page o per_page son 0, retorna una respuesta con 0 cursos.
        if ($page == 0 || $per_page == 0) {
            return array(
                'total' => (int) $total,
                'page' => (int) $page,
                'per_page' => (int) $per_page,
                'total_pages' => 0,
                'data' => array()
            );
        }
    
        // Calcular el total de páginas.
        $total_pages = ceil($total / $per_page);
    
        // Consultar cursos utilizando las funciones nativas de Moodle para paginación.
        $limitfrom = ($page - 1) * $per_page;
        $courses = $DB->get_records('course', null, '', '*', $limitfrom, $per_page);
    
        // Formatear respuesta de cursos.
        $data = array();
        foreach ($courses as $course) {
            
            // Obtener el nombre de la categoría basado en el ID.
            $category = $DB->get_record('course_categories', array('id' => $course->category), 'name');
            $categoryName = $category ? $category->name : strval($course->category); // Si no hay nombre, usa el ID.

            $data[] = array(
                'id' => (int) $course->id,
                'fullname' => (string) $course->fullname,
                'shortname' => (string) $course->shortname,
                'summary' => strip_tags((string) $course->summary), // Elimina tags HTML del resumen.
                'startdate' => (string) date('Y-m-d', $course->startdate),
                'enddate' => (string) date('Y-m-d', $course->enddate),
                'category' => $categoryName
            );
        }
    
        // Construir la respuesta final con la estructura de paginación.
        $result = array(
            'total' => (int) $total,
            'page' => (int) $page,
            'per_page' => (int) $per_page,
            'total_pages' => (int) $total_pages,
            'data' => $data
        );
    
        return $result;
    }

    /**
     * Define la estructura de retorno para la función get_courses.
     * 
     * @return external_single_structure
     */
    public static function get_courses_returns() {
        return new external_single_structure(
            array(
                'total' => new external_value(PARAM_INT, 'Total de cursos encontrados'),
                'page' => new external_value(PARAM_INT, 'Número de página actual'),
                'per_page' => new external_value(PARAM_INT, 'Cantidad de cursos por página'),
                'total_pages' => new external_value(PARAM_INT, 'Total de páginas disponibles'),
                'data' => new external_multiple_structure(
                    new external_single_structure(
                        array(
                            'id' => new external_value(PARAM_INT, 'Identificador del curso'),
                            'fullname' => new external_value(PARAM_TEXT, 'Nombre completo del curso'),
                            'shortname' => new external_value(PARAM_TEXT, 'Nombre corto del curso'),
                            'summary' => new external_value(PARAM_TEXT, 'Resumen del curso'),
                            'startdate' => new external_value(PARAM_TEXT, 'Fecha de inicio del curso'),
                            'enddate' => new external_value(PARAM_TEXT, 'Fecha de finalización del curso'),
                            'category' => new external_value(PARAM_RAW, 'Categoría del curso')
                        )
                    )
                )
            )
        );
    }
}