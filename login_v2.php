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
if ($session->isUserLoggedIn(true)) {
    redirect('home.php', false);
}
?>

<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
        <h1><? echo WELCOME; ?></h1>
        <p><? echo SIGN_IN_TO_START_YOUR_SESSION; ?></p>
    </div>
    <?php echo display_msg($msg); ?>
    <form method="post" action="auth_v2.php" class="clearfix">
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
</div>
<?php include_once('layouts/footer.php'); ?>
