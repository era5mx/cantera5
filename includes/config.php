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

// Database configuration
define('DB_HOST', 'localhost');                     // Set database host
define('DB_PORT', '3306');                          // Set database port
define('DB_USER', 'cantera5');                      // Set database user
define('DB_PASS', '{MODIFICA EL PASSWORD}');                       // Set database password
define('DB_NAME', 'cantera5');                      // Set database name

//Application configuration
define('APP_TITLE', 'CanteRa5');              // Set title app
define('APP_VERSION', 'v.2.1');                     // Set version app
define('APP_LOGO', 'logo_oswa.jpeg');               // Set filename logo app with ext
define('APP_LANG', 'es');                           // Set default language
define('APP_TIMEZONE', 'America/Mexico_City');       // Set timezone

define('MODE_EXECUTION', 'PROD');                    // Set mode execution (DEV | PROD)

define('LIMIT_PRODUCTS_SOLD', '10');                 // Set limit products sold
define('LIMIT_RECENT_PRODUCTS', '5');                // Set limit recent products
define('LIMIT_RECENT_SALES', '5');                   // Set limit recent sales
?>
