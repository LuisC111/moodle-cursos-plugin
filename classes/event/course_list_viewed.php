<?php
namespace local_cursos\event;

defined('MOODLE_INTERNAL') || die();

/**
 * Evento que se activa cuando se visualiza la lista de cursos.
 */
class course_list_viewed extends \core\event\base {

    /**
     * Inicializa las propiedades del evento.
     */
    protected function init() {
        $this->data['crud'] = 'r'; // c(reate), r(ead), u(pdate), d(elete)
        $this->data['edulevel'] = self::LEVEL_OTHER;
        $this->context = \context_system::instance();
    }

    /**
     * Devuelve el nombre del evento.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('courselistviewed', 'local_cursos');
    }

    /**
     * Devuelve la descripción del evento.
     *
     * @return string
     */
    public function get_description() {
        return "El usuario con el id '{$this->userid}' revisó la lista de cursos.";
    }

    /**
     * Devuelve la URL relacionada con este evento.
     *
     * @return \moodle_url
     */
    public function get_url() {
        return new \moodle_url('/local/cursos/index.php');
    }
}