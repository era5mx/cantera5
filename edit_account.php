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
$page_title = getPageTitle(EDIT_ACCOUNT);

page_require_level(3);
?>
<?php
//update user image
if (isset($_POST['submit'])) {
    $photo = new Media();
    $user_id = (int) $_POST['user_id'];
    $photo->upload($_FILES['file_upload']);
    if ($photo->process_user($user_id)) {
        $session->msg('s', PHOTO_HAS_BEEN_UPLOADED);
        redirect('edit_account.php');
    } else {
        $session->msg('d', join($photo->errors));
        redirect('edit_account.php');
    }
}
?>
<?php
//update user other info
if (isset($_POST['update'])) {
    $req_fields = array('name', 'username');
    validate_fields($req_fields);
    if (empty($errors)) {
        $id = (int) $_SESSION['user_id'];
        $name = remove_junk($db->escape($_POST['name']));
        $username = remove_junk($db->escape($_POST['username']));
        $lang = remove_junk($db->escape($_POST['lang']));
        $sql = "UPDATE users SET name ='{$name}', username ='{$username}', lang ='{$lang}' WHERE id='{$id}'";
        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1) {
            $_SESSION['lang'] = remove_junk(strtolower($lang));
            $session->msg('s', ACCOUNT.UPDATED_SUCCESSFULLY);
            redirect('edit_account.php', false);
        } else {
            $session->msg('d', SORRY.FAILED_TO_UPDATED.'!');
            redirect('edit_account.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_account.php', false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo display_msg($msg); ?>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-heading clearfix">
                    <span class="glyphicon glyphicon-camera"></span>
                    <span><? echo CHANGE_MY_PHOTO ?></span>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-circle img-size-2" src="uploads/users/<?php echo $user['image']; ?>" alt="">
                    </div>
                    <div class="col-md-8">
                        <form class="form" action="edit_account.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="file-upload" class="btn btn-default btn-file"><? echo CHOOSE_FILE_TO_UPLOAD ?></label>
                                <input type="file" id="file-upload" name="file_upload" accept="image/png, .jpeg, .jpg, image/gif"/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit" name="submit" class="btn btn-warning"><? echo CHANGE ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <span class="glyphicon glyphicon-edit"></span>
                <span><? echo EDIT_ACCOUNT ?></span>
            </div>
            <div class="panel-body">
                <form method="post" action="edit_account.php?id=<?php echo (int) $user['id']; ?>" class="clearfix">
                    <div class="form-group">
                        <label for="name" class="control-label"><? echo NAME ?></label>
                        <input type="name" class="form-control" name="name" value="<?php echo remove_junk(ucwords($user['name'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label"><? echo USERNAME ?></label>
                        <input type="text" class="form-control" name="username" value="<?php echo remove_junk(ucwords($user['username'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label"><? echo LANGUAGE ?></label>
                        <select name='lang' class="form-control">
                            <option value='ES' <?php
                            if (remove_junk(ucwords($user['lang'])) == 'ES') {
                                echo "selected";
                            }
                            ?> >Español</option>
                            <option value='EN' <?php
                            if (remove_junk(ucwords($user['lang'])) == 'EN') {
                                echo "selected";
                            }
                            ?> >English</option>
                        </select>
                    </div>
                    <div class="form-group clearfix">
                        <a href="change_password.php" title="change password" class="btn btn-danger pull-right"><? echo CHANGE_PASSWORD ?></a>
                        <button type="submit" name="update" class="btn btn-info"><? echo UPDATE ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include_once('layouts/footer.php'); ?>
