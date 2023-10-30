<?php
namespace local_cursos\event;

defined('MOODLE_INTERNAL') || die();

/**
 * Event triggered when the course list is viewed.
 */
class course_list_viewed extends \core\event\base {

    /**
     * Initialize the event properties.
     */
    protected function init() {
        $this->data['crud'] = 'r'; // c(reate), r(ead), u(pdate), d(elete)
        $this->data['edulevel'] = self::LEVEL_OTHER;
        $this->context = \context_system::instance();
    }

    /**
     * Return the name of the event.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('courselistviewed', 'local_cursos');
    }

    /**
     * Return the description of the event.
     *
     * @return string
     */
    public function get_description() {
        return "El usuario con el id '{$this->userid}' revisó la lista de cursos.";
    }

    /**
     * Return the URL related to this event.
     *
     * @return \moodle_url
     */
    public function get_url() {
        return new \moodle_url('/local/cursos/index.php');
    }
}