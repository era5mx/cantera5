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
$page_title = getPageTitle(SALE_REPORT_TITLE);

// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-6">
        <?php echo display_msg($msg); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <form class="clearfix" method="post" action="sale_report_process.php">
                    <div class="form-group">
                        <label class="form-label"><?php echo DATE_RANGE; ?></label>
                        <div class="input-group">
                            <input type="text" class="datepicker form-control" name="start-date" placeholder="<?php echo FROM; ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-menu-right"></i></span>
                            <input type="text" class="datepicker form-control" name="end-date" placeholder="<?php echo TO; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary"><?php echo GENERATE_REPORT; ?></button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
<?php include_once('layouts/footer.php'); ?>
