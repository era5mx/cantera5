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
$page_title = getPageTitle(EDIT_PRODUCT_TITLE);

// Checkin What level user has permission to view this page
page_require_level(2);
?>
<?php
$product = find_by_id('products', (int) $_GET['id']);
$all_categories = find_all('categories');
$all_photo = find_all('media');
if (!$product) {
    $session->msg("d", "Missing product id.");
    redirect('product.php');
}
?>
<?php
if (isset($_POST['product'])) {
    $req_fields = array('product-title', 'product-categorie', 'product-quantity', 'buying-price', 'saleing-price');
    validate_fields($req_fields);

    if (empty($errors)) {
        $p_name = remove_junk($db->escape($_POST['product-title']));
        $p_cat = (int) $_POST['product-categorie'];
        $p_qty = remove_junk($db->escape($_POST['product-quantity']));
        $p_buy = remove_junk($db->escape($_POST['buying-price']));
        $p_sale = remove_junk($db->escape($_POST['saleing-price']));
        if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
            $media_id = '0';
        } else {
            $media_id = remove_junk($db->escape($_POST['product-photo']));
        }
        $query = "UPDATE products SET";
        $query .= " name ='{$p_name}', quantity ='{$p_qty}',";
        $query .= " buy_price ='{$p_buy}', sale_price ='{$p_sale}', categorie_id ='{$p_cat}',media_id='{$media_id}'";
        $query .= " WHERE id ='{$product['id']}'";
        $result = $db->query($query);
        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', PRODUCT.UPDATED_SUCCESSFULLY.'!');
            redirect('product.php', false);
        } else {
            $session->msg('d', SORRY.FAILED_TO_UPDATED.'!');
            redirect('edit_product.php?id=' . $product['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_product.php?id=' . $product['id'], false);
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
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>
                <span class="glyphicon glyphicon-th"></span>
                <span><?php echo EDIT_PRODUCT_TITLE; ?></span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-7">
                <form method="post" action="edit_product.php?id=<?php echo (int) $product['id'] ?>">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th-large"></i>
                            </span>
                            <input type="text" class="form-control" name="product-title" title="<?php echo PRODUCT_NAME; ?>" value="<?php echo remove_junk($product['name']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-control" name="product-categorie" title="<?php echo PRODUCT_CATEGORIE; ?>">
                                    <option value=""><?php echo SELECT; ?><?php echo PRODUCT_CATEGORIE; ?></option>
<?php foreach ($all_categories as $cat): ?>
                                        <option value="<?php echo (int) $cat['id']; ?>" <?php if ($product['categorie_id'] === $cat['id']): echo "selected";
    endif; ?> >
                                        <?php echo remove_junk($cat['name']); ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="product-photo" title="<?php echo PRODUCT_PHOTO; ?>">
                                    <option value=""><?php echo SELECT; ?><?php echo PRODUCT_PHOTO; ?></option>
<?php foreach ($all_photo as $photo): ?>
                                        <option value="<?php echo (int) $photo['id']; ?>" <?php if ($product['media_id'] === $photo['id']): echo "selected";
    endif; ?> >
                                            <?php echo $photo['file_name'] ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty"><?php echo PRODUCT_QUANTITY; ?></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-shopping-cart"></i>
                                        </span>
                                        <input type="number" class="form-control" name="product-quantity" title="<?php echo PRODUCT_QUANTITY; ?>" value="<?php echo remove_junk($product['quantity']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty"><?php echo BUYING_PRICE_REPORT; ?></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-usd"></i>
                                        </span>
                                        <input type="number" class="form-control" name="buying-price" title="<?php echo BUYING_PRICE_REPORT; ?>" value="<?php echo remove_junk($product['buy_price']); ?>">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty"><?php echo SELLING_PRICE_REPORT; ?></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-usd"></i>
                                        </span>
                                        <input type="number" class="form-control" name="saleing-price" title="<?php echo SELLING_PRICE_REPORT; ?>" value="<?php echo remove_junk($product['sale_price']); ?>">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="product" class="btn btn-danger"><?php echo UPDATE; ?></button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
