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
$page_title = getPageTitle(EDIT_GROUP_TITLE);

// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$e_group = find_by_id('user_groups', (int) $_GET['id']);
if (!$e_group) {
    $session->msg("d", "Missing Group id.");
    redirect('group.php');
}
?>
<?php
if (isset($_POST['update'])) {

    $req_fields = array('group-name', 'group-level');
    validate_fields($req_fields);
    if (empty($errors)) {
        $name = remove_junk($db->escape($_POST['group-name']));
        $level = remove_junk($db->escape($_POST['group-level']));
        $status = remove_junk($db->escape($_POST['status']));

        $query = "UPDATE user_groups SET ";
        $query .= "group_name='{$name}',group_level='{$level}',group_status='{$status}'";
        $query .= "WHERE ID='{$db->escape($e_group['id'])}'";
        $result = $db->query($query);
        if ($result && $db->affected_rows() === 1) {
            //sucess
            $session->msg('s', GROUP.UPDATED_SUCCESSFULLY.'!');
            redirect('edit_group.php?id=' . (int) $e_group['id'], false);
        } else {
            //failed
            $session->msg('d', SORRY.FAILED_TO_UPDATED.GROUP.'!');
            redirect('edit_group.php?id=' . (int) $e_group['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_group.php?id=' . (int) $e_group['id'], false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
        <h3><?php echo EDIT_GROUP_TITLE; ?></h3>
    </div>
    <?php echo display_msg($msg); ?>
    <form method="post" action="edit_group.php?id=<?php echo (int) $e_group['id']; ?>" class="clearfix">
        <div class="form-group">
            <label for="name" class="control-label"><?php echo GROUP_NAME; ?></label>
            <input type="name" class="form-control" name="group-name" value="<?php echo remove_junk(ucwords($e_group['group_name'])); ?>">
        </div>
        <div class="form-group">
            <label for="level" class="control-label"><?php echo GROUP_LEVEL; ?></label>
            <input type="number" class="form-control" name="group-level" value="<?php echo (int) $e_group['group_level']; ?>">
        </div>
        <div class="form-group">
            <label for="status"><?php echo STATUS; ?></label>
            <select class="form-control" name="status">
                <option <?php if ($e_group['group_status'] === '1') echo 'selected="selected"'; ?> value="1"> <?php echo ACTIVE; ?> </option>
                <option <?php if ($e_group['group_status'] === '0') echo 'selected="selected"'; ?> value="0"> <?php echo INACTIVE; ?> </option>
            </select>
        </div>
        <div class="form-group clearfix">
            <button type="submit" name="update" class="btn btn-info"><?php echo UPDATE; ?></button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>
