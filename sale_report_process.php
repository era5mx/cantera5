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
$page_title = getPageTitle(SALES_REPORT_TITLE);

$results = '';

// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php
if (isset($_POST['submit'])) {
    $req_dates = array('start-date', 'end-date');
    validate_fields($req_dates);

    if (empty($errors)):
        $start_date = remove_junk($db->escape($_POST['start-date']));
        $end_date = remove_junk($db->escape($_POST['end-date']));
        $results = find_sale_by_dates($start_date, $end_date);
    else:
        $session->msg("d", $errors);
        redirect('sales_report.php', false);
    endif;
} else {
    $session->msg("d", "Select dates");
    redirect('sales_report.php', false);
}
?>
<!doctype html>
<html lang="<?php echo APP_LANG; ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo SALES_REPORT; ?></title>
        <!-- Bootstrap 3.4.1 -->
        <link rel="stylesheet" href="libs/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="libs/css/report.css"/>
    </head>
    <body>
        <?php if ($results): ?>
            <div class="page-break">
                <div class="sale-head pull-right">
                    <h1><?php echo SALES_REPORT; ?></h1>
                    <strong><?php echo FROM; ?> <?php if (isset($start_date)) {
                echo $start_date;
            } ?> <?php echo TO; ?> <?php if (isset($end_date)) {
                echo $end_date;
            } ?> </strong>
                </div>
                <table class="table table-border">
                    <thead>
                        <tr>
                            <th><?php echo DATE_REPORT; ?></th>
                            <th><?php echo PRODUCT_TITLE_REPORT; ?></th>
                            <th><?php echo BUYING_PRICE_REPORT; ?></th>
                            <th><?php echo SELLING_PRICE_REPORT; ?></th>
                            <th><?php echo TOTAL_QTY_REPORT; ?></th>
                            <th><?php echo TOTAL_REPORT; ?></th>
                        </tr>
                    </thead>
                    <tbody>
    <?php foreach ($results as $result): ?>
                            <tr>
                                <td class=""><?php echo remove_junk($result['date']); ?></td>
                                <td class="desc">
                                    <h6><?php echo remove_junk(ucfirst($result['name'])); ?></h6>
                                </td>
                                <td class="text-right"><?php echo remove_junk($result['buy_price']); ?></td>
                                <td class="text-right"><?php echo remove_junk($result['sale_price']); ?></td>
                                <td class="text-right"><?php echo remove_junk($result['total_sales']); ?></td>
                                <td class="text-right"><?php echo remove_junk($result['total_saleing_price']); ?></td>
                            </tr>
    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="text-right">
                            <td colspan="4"></td>
                            <td colspan="1"><?php echo GRAND_TOTAL; ?></td>
                            <td> $
    <?php echo number_format(total_price($results)[0], 2); ?>
                            </td>
                        </tr>
                        <tr class="text-right">
                            <td colspan="4"></td>
                            <td colspan="1"><?php echo PROFIT; ?></td>
                            <td> $<?php echo number_format(total_price($results)[1], 2); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <?php
        else:
            $session->msg("d", SORRY . NO_SALES_HAS_BEEN_FOUND);
            redirect('sales_report.php', false);
        endif;
        ?>
    </body>
</html>
<?php if (isset($db)) {
    $db->db_disconnect();
} ?>
