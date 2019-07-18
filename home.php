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
$user = current_user();
if (isset($user['lang']) && $user['lang'] != ' ') {
    $_SESSION['lang'] = remove_junk(strtolower($user['lang']));
}
if (isset($_SESSION['lang']) && $_SESSION['lang'] != ' ') {
    include(!file_exists('includes/lang/lang_' . $_SESSION['lang'] . '.php') ? 'includes/lang/lang_en.php' : 'includes/lang/lang_' . $_SESSION['lang'] . '.php' );
}
$page_title = getPageTitle(HOME_PAGE_TITLE);

if (!$session->isUserLoggedIn(true)) {
    redirect('index.php', false);
}
?>
        <?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12">
<?php echo display_msg($msg); ?>
    </div>
    <div class="col-md-12">
        <div class="panel">
            <div class="jumbotron text-center">
                <h1><?php echo INFO_HOME_H1; ?></h1>
                <p><?php echo INFO_HOME_P; ?></p>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>
