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
require_once('includes/load.php');
if (isset($_SESSION['lang']) && $_SESSION['lang'] != ' ') {
    include(!file_exists('includes/lang/lang_' . $_SESSION['lang'] . '.php') ? 'includes/lang/lang_en.php' : 'includes/lang/lang_' . $_SESSION['lang'] . '.php' );
}
// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php

$d_sale = find_by_id('sales', (int) $_GET['id']);
if (!$d_sale) {
    $session->msg("d", "Missing sale id.");
    redirect('sales.php');
}
?>
<?php

$delete_id = delete_by_id('sales', (int) $d_sale['id']);
if ($delete_id) {
    $session->msg("s", "sale deleted.");
    redirect('sales.php');
} else {
    $session->msg("d", "sale deletion failed.");
    redirect('sales.php');
}
?>
