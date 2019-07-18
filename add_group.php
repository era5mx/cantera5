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
$page_title = $page_title = getPageTitle(ADD_GROUP_TITLE);

// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
if (isset($_POST['add'])) {

    $req_fields = array('group-name', 'group-level');
    validate_fields($req_fields);

    if (find_by_groupName($_POST['group-name']) === false) {
        $session->msg('d', SORRY . ENTERED_GROUP_NAME_ALREADY_IN_DATABASE);
        redirect('add_group.php', false);
    } elseif (find_by_groupLevel($_POST['group-level']) === false) {
        $session->msg('d', SORRY . ENTERED_GROUP_LEVEL_ALREADY_IN_DATABASE);
        redirect('add_group.php', false);
    }
    if (empty($errors)) {

        $name = remove_junk($db->escape($_POST['group-name']));
        $level = remove_junk($db->escape($_POST['group-level']));
        $status = remove_junk($db->escape($_POST['status']));

        $query = "INSERT INTO user_groups (";
        $query .= "group_name,group_level,group_status";
        $query .= ") VALUES (";
        $query .= " '{$name}', '{$level}','{$status}'";
        $query .= ")";
        if ($db->query($query)) {
            //sucess
            $session->msg('s', GROUP.CREATED_SUCCESSFULLY);
            redirect('add_group.php', false);
        } else {
            //failed
            $session->msg('d', SORRY.FAILED_TO_CREATE.GROUP.'!');
            redirect('add_group.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('add_group.php', false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
        <h3><?php echo ADD_NEW_USER_GROUP; ?></h3>
    </div>
    <?php echo display_msg($msg); ?>
    <form method="post" action="add_group.php" class="clearfix">
        <div class="form-group">
            <label for="name" class="control-label"><?php echo GROUP_NAME; ?></label>
            <input type="name" class="form-control" name="group-name">
        </div>
        <div class="form-group">
            <label for="level" class="control-label"><?php echo GROUP_LEVEL; ?></label>
            <input type="number" class="form-control" name="group-level">
        </div>
        <div class="form-group">
            <label for="status"><?php echo STATUS; ?></label>
            <select class="form-control" name="status">
                <option value="1"><?php echo ACTIVE; ?></option>
                <option value="0"><?php echo INACTIVE; ?></option>
            </select>
        </div>
        <div class="form-group clearfix">
            <button type="submit" name="add" class="btn btn-info"><?php echo UPDATE; ?></button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>
