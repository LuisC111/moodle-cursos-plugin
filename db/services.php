<?php
/**
 * Definiciones de servicios web para el plugin 'cursos'.
 * 
 * Este archivo define las funciones del servicio web que están expuestas 
 * para ser utilizadas por otros sistemas a través de la API de Moodle.
 */

// Asegura que el script no sea accedido directamente.
defined('MOODLE_INTERNAL') || die();

$functions = array(
    'local_cursos_get_courses' => array(
        'classname'   => 'local_cursos_external',
        'methodname'  => 'get_courses',
        'classpath'   => 'local/cursos/classes/external.php',
        'description' => 'Obtiene una lista de cursos con paginación.',
        'type'        => 'read',
        'ajax'        => true,
    ),
);