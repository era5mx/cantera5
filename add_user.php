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
$page_title = $page_title = getPageTitle(ADD_USER_TITLE);

// Checkin What level user has permission to view this page
page_require_level(1);
$groups = find_all('user_groups');
?>
<?php
if (isset($_POST['add_user'])) {

    $req_fields = array('full-name', 'username', 'password', 'level');
    validate_fields($req_fields);

    if (empty($errors)) {
        $name = remove_junk($db->escape($_POST['full-name']));
        $username = remove_junk($db->escape($_POST['username']));
        $password = remove_junk($db->escape($_POST['password']));
        $user_level = (int) $db->escape($_POST['level']);
        $password = sha1($password);
        $query = "INSERT INTO users (";
        $query .= "name,username,password,user_level,status";
        $query .= ") VALUES (";
        $query .= " '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
        $query .= ")";
        if ($db->query($query)) {
            //sucess
            $session->msg('s', ACCOUNT.CREATED_SUCCESSFULLY);
            redirect('add_user.php', false);
        } else {
            //failed
            $session->msg('d', SORRY.FAILED_TO_CREATE.ACCOUNT.'!');
            redirect('add_user.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('add_user.php', false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>
<?php echo display_msg($msg); ?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>
                <span class="glyphicon glyphicon-th"></span>
                <span><? echo ADD_NEW_USER ?></span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="add_user.php">
                    <div class="form-group">
                        <label for="name"><? echo NAME ?></label>
                        <input type="text" class="form-control" name="full-name" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label for="username"><? echo USERNAME ?></label>
                        <input type="text" class="form-control" name="username" placeholder="<? echo USERNAME ?>">
                    </div>
                    <div class="form-group">
                        <label for="password"><? echo PASSWORD ?></label>
                        <input type="password" class="form-control" name ="password"  placeholder="<? echo PASSWORD ?>">
                    </div>
                    <div class="form-group">
                        <label for="level"><? echo USER_ROLE ?></label>
                        <select class="form-control" name="level">
                            <?php foreach ($groups as $group): ?>
                                <option value="<?php echo $group['group_level']; ?>"><?php echo ucwords($group['group_name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="add_user" class="btn btn-primary"><? echo ADD_USER ?></button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
