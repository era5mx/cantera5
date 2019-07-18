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
$page_title = getPageTitle(ADMIN_HOME_PAGE);

// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$c_categorie = count_by_id('categories');
$c_product = count_by_id('products');
$c_sale = count_by_id('sales');
$c_user = count_by_id('users');
$products_sold = find_higest_saleing_product(LIMIT_PRODUCTS_SOLD);
$recent_products = find_recent_product_added(LIMIT_RECENT_PRODUCTS);
$recent_sales = find_recent_sale_added(LIMIT_RECENT_SALES)
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
    <div class="col-md-6">
        <?php echo display_msg($msg); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-box clearfix">
            <div class="panel-icon pull-left bg-green">
                <i class="glyphicon glyphicon-user"></i>
            </div>
            <div class="panel-value pull-right">
                <h2 class="margin-top"> <?php echo $c_user['total']; ?> </h2>
                <p class="text-muted"><?php echo USERS; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-box clearfix">
            <div class="panel-icon pull-left bg-red">
                <i class="glyphicon glyphicon-list"></i>
            </div>
            <div class="panel-value pull-right">
                <h2 class="margin-top"> <?php echo $c_categorie['total']; ?> </h2>
                <p class="text-muted"><?php echo CATEGORIES; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-box clearfix">
            <div class="panel-icon pull-left bg-blue">
                <i class="glyphicon glyphicon-shopping-cart"></i>
            </div>
            <div class="panel-value pull-right">
                <h2 class="margin-top"> <?php echo $c_product['total']; ?> </h2>
                <p class="text-muted"><?php echo PRODUCTS; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-box clearfix">
            <div class="panel-icon pull-left bg-yellow">
                <i class="glyphicon glyphicon-usd"></i>
            </div>
            <div class="panel-value pull-right">
                <h2 class="margin-top"> <?php echo $c_sale['total']; ?></h2>
                <p class="text-muted"><?php echo SALES; ?></p>
            </div>
        </div>
    </div>
</div>

<!-- 
<div class="row">
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
         <h1>Thank You! for your support and love.</h1>
         <p> <strong>OSWA-INV v2</strong> way more better then <strong> v1 </strong>.
         </br>If you have a question regarding the usage of this applications, please ask on <a href="https://www.facebook.com/oswapp" title="Facebook" target="_blank">Facebook</a> OSWA Fan page.</p>

      </div>
    </div>
 </div>
</div>
-->

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span><?php echo HIGHEST_SALEING_PRODUCTS; ?></span>
                </strong>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th><?php echo TITLE; ?></th>
                            <th><?php echo TOTAL_SOLD; ?></th>
                            <th><?php echo TOTAL_QUANTITY; ?></th>
                        <tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products_sold as $product_sold): ?>
                            <tr>
                                <td><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                                <td><?php echo (int) $product_sold['totalSold']; ?></td>
                                <td><?php echo (int) $product_sold['totalQty']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span><?php echo LATEST_SALES; ?></span>
                </strong>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th><?php echo PRODUCT_NAME; ?></th>
                            <th><?php echo DATE; ?></th>
                            <th><?php echo LATEST_SALES; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_sales as $recent_sale): ?>
                            <tr>
                                <td class="text-center"><?php echo count_id(); ?></td>
                                <td>
                                    <a href="edit_sale.php?id=<?php echo (int) $recent_sale['id']; ?>">
                                        <?php echo remove_junk(first_character($recent_sale['name'])); ?>
                                    </a>
                                </td>
                                <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
                                <td>$<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span><?php echo RECENTLY_ADDED_PRODUCTS; ?></span>
                </strong>
            </div>
            <div class="panel-body">

                <div class="list-group">
                    <?php foreach ($recent_products as $recent_product): ?>
                        <a class="list-group-item clearfix" href="edit_product.php?id=<?php echo (int) $recent_product['id']; ?>">
                            <h4 class="list-group-item-heading">
                                <?php if ($recent_product['media_id'] === '0'): ?>
                                    <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt="">
                                <?php else: ?>
                                    <img class="img-avatar img-circle" src="uploads/products/<?php echo $recent_product['image']; ?>" alt="" />
                                <?php endif; ?>
                                <?php echo remove_junk(first_character($recent_product['name'])); ?>
                                <span class="label label-warning pull-right">
                                    $<?php echo (int) $recent_product['sale_price']; ?>
                                </span>
                            </h4>
                            <span class="list-group-item-text pull-right">
                                <?php echo remove_junk(first_character($recent_product['categorie'])); ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

</div>

<?php include_once('layouts/footer.php'); ?>
