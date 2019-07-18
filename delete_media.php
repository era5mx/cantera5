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
page_require_level(2);
?>
<?php

$find_media = find_by_id('media', (int) $_GET['id']);
$photo = new Media();
if ($photo->media_destroy($find_media['id'], $find_media['file_name'])) {
    $session->msg("s", "Photo has been deleted.");
    redirect('media.php');
} else {
    $session->msg("d", "Photo deletion failed Or Missing Prm.");
    redirect('media.php');
}
?>
