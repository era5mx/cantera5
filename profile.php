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
$page_title = getPageTitle(MY_PROFILE_TITLE);

// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php
$user_id = (int) $_GET['id'];
if (empty($user_id)):
    redirect('home.php', false);
else:
    $user_p = find_by_id('users', $user_id);
endif;
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="panel profile">
            <div class="jumbotron text-center bg-red">
                <img class="img-circle img-size-2" src="uploads/users/<?php echo $user_p['image']; ?>" alt="">
                <h3><?php echo first_character($user_p['name']); ?></h3>
            </div>
            <?php if ($user_p['id'] === $user['id']): ?>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="edit_account.php"> <i class="glyphicon glyphicon-edit"></i> <? echo EDIT_PROFILE ?> </a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>
