<ul>
    <li>
        <a href="admin.php">
            <i class="glyphicon glyphicon-home"></i>
            <span><?php echo DASHBOARD; ?></span>
        </a>
    </li>
    <li>
        <a href="#" class="submenu-toggle">
            <i class="glyphicon glyphicon-user"></i>
            <span><?php echo USER_MANAGEMENT; ?></span>
        </a>
        <ul class="nav submenu">
            <li><a href="group.php"><?php echo MANAGE_GROUPS; ?></a> </li>
            <li><a href="users.php"><?php echo MANAGE_USERS; ?></a> </li>
        </ul>
    </li>
    <li>
        <a href="categorie.php" >
            <i class="glyphicon glyphicon-indent-left"></i>
            <span><?php echo CATEGORIES; ?></span>
        </a>
    </li>
    <li>
        <a href="#" class="submenu-toggle">
            <i class="glyphicon glyphicon-th-large"></i>
            <span><?php echo PRODUCTS; ?></span>
        </a>
        <ul class="nav submenu">
            <li><a href="product.php"><?php echo MANAGE_PRODUCTS; ?></a> </li>
            <li><a href="add_product.php"><?php echo ADD_PRODUCT; ?></a> </li>
        </ul>
    </li>
    <li>
        <a href="media.php" >
            <i class="glyphicon glyphicon-picture"></i>
            <span><?php echo MEDIAS; ?></span>
        </a>
    </li>
    <li>
        <a href="#" class="submenu-toggle">
            <i class="glyphicon glyphicon-th-list"></i>
            <span><?php echo SALES; ?></span>
        </a>
        <ul class="nav submenu">
            <li><a href="sales.php"><?php echo MANAGE_SALES; ?></a> </li>
            <li><a href="add_sale.php"><?php echo ADD_SALE; ?></a> </li>
        </ul>
    </li>
    <li>
        <a href="#" class="submenu-toggle">
            <i class="glyphicon glyphicon-signal"></i>
            <span><?php echo SALES_REPORT; ?></span>
        </a>
        <ul class="nav submenu">
            <li><a href="sales_report.php"><?php echo SALES_BY_DATES; ?></a></li>
            <li><a href="monthly_sales.php"><?php echo MONTHLY_SALES; ?></a></li>
            <li><a href="daily_sales.php"><?php echo DAILY_SALES; ?></a> </li>
        </ul>
    </li>
</ul>
