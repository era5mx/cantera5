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
$page_title = getPageTitle(DAILY_SALES_TITLE);

// Checkin What level user has permission to view this page
page_require_level(3);
?>

<?php
$year = date('Y');
$month = date('m');
$sales = dailySales($year, $month);
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-6">
        <?php echo display_msg($msg); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span><?php echo DAILY_SALES_TITLE; ?></span>
                </strong>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th> <?php echo PRODUCT_NAME; ?> </th>
                            <th class="text-center" style="width: 15%;"> <?php echo QUANTITY_SOLD_REPORT; ?> </th>
                            <th class="text-center" style="width: 15%;"> <?php echo TOTAL_REPORT; ?> </th>
                            <th class="text-center" style="width: 15%;"> <?php echo DATE_REPORT; ?> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sales as $sale): ?>
                            <tr>
                                <td class="text-center"><?php echo count_id(); ?></td>
                                <td><?php echo remove_junk($sale['name']); ?></td>
                                <td class="text-center"><?php echo (int) $sale['qty']; ?></td>
                                <td class="text-center"><?php echo remove_junk($sale['total_saleing_price']); ?></td>
                                <td class="text-center"><?php echo $sale['date']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
