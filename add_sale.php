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
$page_title = $page_title = getPageTitle(ADD_SALE_TITLE);

// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php
if (isset($_POST['add_sale'])) {
    $req_fields = array('s_id', 'quantity', 'price', 'total', 'date');
    validate_fields($req_fields);
    if (empty($errors)) {
        $p_id = $db->escape((int) $_POST['s_id']);
        $s_qty = $db->escape((int) $_POST['quantity']);
        $s_total = $db->escape($_POST['total']);
        $date = $db->escape($_POST['date']);
        $s_date = make_date();

        $sql = "INSERT INTO sales (";
        $sql .= " product_id,qty,price,date";
        $sql .= ") VALUES (";
        $sql .= "'{$p_id}','{$s_qty}','{$s_total}','{$s_date}'";
        $sql .= ")";

        if ($db->query($sql)) {
            update_product_qty($s_qty, $p_id);
            $session->msg('s', "Sale added. ");
            redirect('add_sale.php', false);
        } else {
            $session->msg('d', SORRY.FAILED_TO_ADDED.SALE.'!');
            redirect('add_sale.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('add_sale.php', false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-6">
<?php echo display_msg($msg); ?>
        <form method="post" action="ajax.php" autocomplete="off" id="sug-form">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><?php echo FIND_IT; ?></button>
                    </span>
                    <input type="text" id="sug_input" class="form-control" name="title"  placeholder="<?php echo SEARCH_FOR_PRODUCT_NAME; ?>">
                </div>
                <div id="result" class="list-group"></div>
            </div>
        </form>
    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span><?php echo ADD_SALE_TITLE; ?></span>
                </strong>
            </div>
            <div class="panel-body">
                <form method="post" action="add_sale.php">
                    <table class="table table-bordered">
                        <thead>
                        <th> <?php echo ITEM; ?> </th>
                        <th> <?php echo PRICE; ?> </th>
                        <th> <?php echo QTY; ?> </th>
                        <th> <?php echo TOTAL; ?> </th>
                        <th> <?php echo DATE; ?> </th>
                        <th> <?php echo ACTION; ?> </th>
                        </thead>
                        <tbody  id="product_info"> </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include_once('layouts/footer.php'); ?>
