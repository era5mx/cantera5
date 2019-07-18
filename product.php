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
$page_title = getPageTitle(ALL_PRODUCT_TITLE);

// Checkin What level user has permission to view this page
page_require_level(2);
$products = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo display_msg($msg); ?>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span><? echo ALL_PRODUCT_TITLE ?></span>
                </strong>
                <div class="pull-right">
                    <a href="add_product.php" class="btn btn-primary"><? echo ADD_NEW_PRODUCT ?></a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th> <?php echo PHOTO; ?></th>
                            <th> <?php echo PRODUCT_TITLE; ?> </th>
                            <th class="text-center" style="width: 10%;"> <?php echo CATEGORIE; ?> </th>
                            <th class="text-center" style="width: 10%;"> <?php echo IN_STOCK; ?> </th>
                            <th class="text-center" style="width: 10%;"> <?php echo BUYING_PRICE_REPORT; ?> </th>
                            <th class="text-center" style="width: 10%;"> <?php echo SELLING_PRICE_REPORT; ?> </th>
                            <th class="text-center" style="width: 10%;"> <?php echo PRODUCT_ADDED; ?> </th>
                            <th class="text-center" style="width: 100px;"> <? echo ACTIONS ?> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td class="text-center"><?php echo count_id(); ?></td>
                                <td>
                                    <?php if ($product['media_id'] === '0'): ?>
                                        <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt="">
                                    <?php else: ?>
                                        <img class="img-avatar img-circle" src="uploads/products/<?php echo $product['image']; ?>" alt="">
                                    <?php endif; ?>
                                </td>
                                <td> <?php echo remove_junk($product['name']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($product['quantity']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($product['buy_price']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($product['sale_price']); ?></td>
                                <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="edit_product.php?id=<?php echo (int) $product['id']; ?>" class="btn btn-info btn-xs"  title="<? echo EDIT ?>" data-toggle="tooltip">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="delete_product.php?id=<?php echo (int) $product['id']; ?>" class="btn btn-danger btn-xs"  title="<? echo REMOVE ?>" data-toggle="tooltip">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </tabel>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>
