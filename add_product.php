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
$page_title = getPageTitle(ADD_PRODUCT_TITLE);

// Checkin What level user has permission to view this page
page_require_level(2);

$all_categories = find_all('categories');
$all_photo = find_all('media');
?>
<?php
if (isset($_POST['add_product'])) {
    $req_fields = array('product-title', 'product-categorie', 'product-quantity', 'buying-price', 'saleing-price');
    validate_fields($req_fields);
    if (empty($errors)) {
        $p_name = remove_junk($db->escape($_POST['product-title']));
        $p_cat = remove_junk($db->escape($_POST['product-categorie']));
        $p_qty = remove_junk($db->escape($_POST['product-quantity']));
        $p_buy = remove_junk($db->escape($_POST['buying-price']));
        $p_sale = remove_junk($db->escape($_POST['saleing-price']));
        if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
            $media_id = '0';
        } else {
            $media_id = remove_junk($db->escape($_POST['product-photo']));
        }
        $date = make_date();
        $query = "INSERT INTO products (";
        $query .= " name,quantity,buy_price,sale_price,categorie_id,media_id,date";
        $query .= ") VALUES (";
        $query .= " '{$p_name}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$media_id}', '{$date}'";
        $query .= ")";
        $query .= " ON DUPLICATE KEY UPDATE name='{$p_name}'";
        if ($db->query($query)) {
            $session->msg('s', PRODUCT_ADDED);
            redirect('add_product.php', false);
        } else {
            $session->msg('d', SORRY.FAILED_TO_ADDED.PRODUCT.'!');
            redirect('product.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('add_product.php', false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12">
<?php echo display_msg($msg); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span><? echo ADD_PRODUCT_TITLE ?></span>
                </strong>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form method="post" action="add_product.php" class="clearfix">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-th-large"></i>
                                </span>
                                <input type="text" class="form-control" name="product-title" placeholder="<?php echo PRODUCT_TITLE; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control" name="product-categorie">
                                        <option value=""><?php echo SELECT; ?><?php echo PRODUCT_CATEGORIE; ?></option>
<?php foreach ($all_categories as $cat): ?>
                                            <option value="<?php echo (int) $cat['id'] ?>">
                                            <?php echo $cat['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="product-photo">
                                        <option value=""><?php echo SELECT; ?><?php echo PRODUCT_PHOTO; ?></option>
<?php foreach ($all_photo as $photo): ?>
                                            <option value="<?php echo (int) $photo['id'] ?>">
                                            <?php echo $photo['file_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-shopping-cart"></i>
                                        </span>
                                        <input type="number" class="form-control" name="product-quantity" placeholder="0" title="<?php echo PRODUCT_QUANTITY; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-usd"></i>
                                        </span>
                                        <input type="number" class="form-control" name="buying-price" placeholder="0" title="<?php echo BUYING_PRICE_REPORT; ?>">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-usd"></i>
                                        </span>
                                        <input type="number" class="form-control" name="saleing-price" placeholder="0" title="<?php echo SELLING_PRICE_REPORT; ?>">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-danger"><? echo ADD_NEW_PRODUCT ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
