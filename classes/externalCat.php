<?php
use core\oauth2\service\microsoft;
// Asegura que el script no sea accedido directamente.
defined('MOODLE_INTERNAL') || die();

// Importa la biblioteca externa de Moodle.
require_once($CFG->libdir . "/externallib.php");

/**
 * Clase que proporciona funciones externas para obtener cursos.
 */
class local_cursos_categories extends external_api {

    public static function get_categories_parameters() {
        return new external_function_parameters(array());
    }

    public static function get_categories() {
        global $DB;

        $context = context_system::instance();
        self::validate_context($context);

        $categories = $DB->get_records('course_categories');

        $data = array();
        foreach ($categories as $category) {
            $data[] = array(
                'id' => (int) $category->id,
                'name' => format_string($category->name)
            );
        }

        return $data;

    }

    public static function get_categories_returns() {

        return new external_multiple_structure(
            new external_single_structure(
                array(
                    'id' => new external_value(PARAM_INT,'Identificador de la categoria'),
                    'name' => new external_value(PARAM_TEXT, 'Nombre de la categoria')
                )
            )
        );

    }

}
