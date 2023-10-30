<?php
/**
 * Definición de la versión y metadatos para el plugin 'cursos'.
 * 
 * Este archivo contiene información sobre la versión del plugin, 
 * la versión mínima de Moodle requerida y otros detalles relacionados.
 */

// Asegura que el script no sea accedido directamente.
defined('MOODLE_INTERNAL') || die();

$plugin->component = 'local_cursos';   // Nombre completo del plugin.
$plugin->version   = 2023103005;       // Versión actual del plugin en formato YYYYMMDDXX.
$plugin->requires  = 2021051700;       // Versión mínima de Moodle requerida; en este caso, 4.1.
$plugin->maturity  = MATURITY_STABLE;  // Estabilidad del plugin.
$plugin->release   = 'v1.0';           // Versión en formato legible.