<?php

/*
 * ------------------------------------------------------------------------
 * CanteRa5 (OWSA-INV V2.1)
 * ------------------------------------------------------------------------
 * Author: David Rengifo
 * Author page: http://david.rengifo.mx/
 * 
 * Basado en: OSWA-INV (https://github.com/siamon123/warehouse-inventory-system)
 */

// -----------------------------------------------------------------------
// DEFINE SEPERATOR ALIASES
// -----------------------------------------------------------------------
define("URL_SEPARATOR", '/');

define("DS", DIRECTORY_SEPARATOR);

// -----------------------------------------------------------------------
// DEFINE ROOT PATHS
// -----------------------------------------------------------------------
defined('SITE_ROOT') ? null : define('SITE_ROOT', realpath(dirname(__FILE__)));
define("LIB_PATH_INC", SITE_ROOT . DS);


require_once(LIB_PATH_INC . 'config.php');
require_once(LIB_PATH_INC . 'functions.php');
require_once(LIB_PATH_INC . 'session.php');
require_once(LIB_PATH_INC . 'upload.php');
require_once(LIB_PATH_INC . 'database.php');
require_once(LIB_PATH_INC . 'sql.php');
?>
