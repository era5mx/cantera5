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
ob_start();
require_once('includes/load.php');
session_start();
$_SESSION['lang'] = APP_LANG;
if (isset($_SESSION['lang']) && $_SESSION['lang'] != ' ') {
    include(!file_exists('includes/lang/lang_' . $_SESSION['lang'] . '.php') ? 'includes/lang/lang_en.php' : 'includes/lang/lang_' . $_SESSION['lang'] . '.php' );
}
if ($session->isUserLoggedIn(true)) {
    redirect('home.php', false);
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page-head">
    <p>&nbsp;</p>
    <div class="text-center">
        <img class="img-avatar img-circle" src="libs/images/<?php echo APP_LOGO; ?>" alt="<? echo APP_TITLE; ?>" />
        <h1><? echo APP_TITLE; ?></h1>
    </div>

    <div class="login-page">
        <div class="text-center">
            <h3><? echo WELCOME; ?></h3>
            <p><? echo SIGN_IN_TO_START_YOUR_SESSION; ?></p>
        </div>
<?php echo display_msg($msg); ?>
        <form method="post" action="auth.php" class="clearfix">
            <div class="form-group">
                <label for="username" class="control-label"><? echo USERNAME; ?></label>
                <input type="name" class="form-control" name="username" placeholder="<? echo USERNAME; ?>">
            </div>
            <div class="form-group">
                <label for="Password" class="control-label"><? echo PASSWORD; ?></label>
                <input type="password" name= "password" class="form-control" placeholder="<? echo PASSWORD; ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right"><? echo LOGIN; ?></button>
            </div>
        </form>
        <p>&nbsp;</p>
    </div>

    <div class="text-center">
        <h5><? echo APP_VERSION; ?></h5>
    </div>

</div>

<?php include_once('layouts/footer.php'); ?>
