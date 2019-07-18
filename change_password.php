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
$page_title = getPageTitle(CHANGE_PASSWORD_TITLE);

// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php $user = current_user(); ?>
<?php
if (isset($_POST['update'])) {

    $req_fields = array('new-password', 'old-password', 'id');
    validate_fields($req_fields);

    if (empty($errors)) {

        if (sha1($_POST['old-password']) !== current_user()['password']) {
            $session->msg('d', YOUR_OLD_PASSWORD_NOT_MATCH);
            redirect('change_password.php', false);
        }

        $id = (int) $_POST['id'];
        $new = remove_junk($db->escape(sha1($_POST['new-password'])));
        $sql = "UPDATE users SET password ='{$new}' WHERE id='{$db->escape($id)}'";
        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1):
            $session->logout();
            $session->msg('s', LOGIN_WITH_YOUR_NEW_PASSWORD);
            redirect('index.php', false);
        else:
            $session->msg('d', SORRY.FAILED_TO_UPDATED.'!');
            redirect('change_password.php', false);
        endif;
    } else {
        $session->msg("d", $errors);
        redirect('change_password.php', false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
        <h3><?php echo CHANGE_YOUR_PASSWORD; ?></h3>
    </div>
    <?php echo display_msg($msg); ?>
    <form method="post" action="change_password.php" class="clearfix">
        <div class="form-group">
            <label for="newPassword" class="control-label"><?php echo NEW_PASSWORD; ?></label>
            <input type="password" class="form-control" name="new-password" placeholder="<?php echo NEW_PASSWORD; ?>">
        </div>
        <div class="form-group">
            <label for="oldPassword" class="control-label"><?php echo OLD_PASSWORD; ?></label>
            <input type="password" class="form-control" name="old-password" placeholder="<?php echo OLD_PASSWORD; ?>">
        </div>
        <div class="form-group clearfix">
            <input type="hidden" name="id" value="<?php echo (int) $user['id']; ?>">
            <button type="submit" name="update" class="btn btn-info"><?php echo CHANGE; ?></button>
        </div>
    </form>
</div>
<?php include_once('layouts/footer.php'); ?>
