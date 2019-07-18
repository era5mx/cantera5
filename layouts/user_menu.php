<ul>
    <li>
        <a href="home.php">
            <i class="glyphicon glyphicon-home"></i>
            <span><?php echo DASHBOARD; ?></span>
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
            <span>Sales Report</span>
        </a>
        <ul class="nav submenu">
            <li><a href="sales_report.php"><?php echo SALES_BY_DATES; ?></a></li>
            <li><a href="monthly_sales.php"><?php echo MONTHLY_SALES; ?></a></li>
            <li><a href="daily_sales.php"><?php echo DAILY_SALES; ?></a> </li>
        </ul>
    </li>
</ul>
