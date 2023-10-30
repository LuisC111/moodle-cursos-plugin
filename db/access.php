<?php
/**
 * Definiciones de capacidades para el plugin 'cursos'.
 * 
 * Este archivo define las capacidades que se pueden asignar a diferentes roles 
 * en el contexto del plugin 'cursos'.
 */

// Asegura que el script no sea accedido directamente.
defined('MOODLE_INTERNAL') || die();

$capabilities = array(
    'local/cursos:view' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW,
            'guest' => CAP_PREVENT,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),
);