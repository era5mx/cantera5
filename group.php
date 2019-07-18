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
$page_title = getPageTitle(ALL_GROUP_TITLE);

// Checkin What level user has permission to view this page
page_require_level(1);
$all_groups = find_all('user_groups');
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo display_msg($msg); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span><?php echo GROUPS; ?></span>
                </strong>
                <a href="add_group.php" class="btn btn-info pull-right btn-sm"><?php echo ADD_NEW_USER_GROUP; ?></a>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th><?php echo GROUP_NAME; ?></th>
                            <th class="text-center" style="width: 20%;"><?php echo GROUP_LEVEL; ?></th>
                            <th class="text-center" style="width: 15%;"><?php echo STATUS; ?></th>
                            <th class="text-center" style="width: 100px;"><?php echo ACTIONS; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_groups as $a_group): ?>
                            <tr>
                                <td class="text-center"><?php echo count_id(); ?></td>
                                <td><?php echo remove_junk(ucwords($a_group['group_name'])) ?></td>
                                <td class="text-center">
                                    <?php echo remove_junk(ucwords($a_group['group_level'])) ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($a_group['group_status'] === '1'): ?>
                                        <span class="label label-success"><?php echo ACTIVE; ?></span>
                                    <?php else: ?>
                                        <span class="label label-danger"><?php echo INACTIVE; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="edit_group.php?id=<?php echo (int) $a_group['id']; ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="<? echo EDIT ?>">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <a href="delete_group.php?id=<?php echo (int) $a_group['id']; ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="<? echo REMOVE ?>">
                                            <i class="glyphicon glyphicon-remove"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>
