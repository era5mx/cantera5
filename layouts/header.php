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
$user = current_user();
if (isset($user['lang']) && $user['lang'] != ' ') {
    $_SESSION['lang'] = remove_junk(strtolower($user['lang']));
}
?>
<!DOCTYPE html>
<html lang="<? echo APP_LANG; ?>">
    <head>
        <meta charset="UTF-8">
        <title>
            <?php
            if (!empty($page_title)) {
                echo remove_junk($page_title);
            } elseif (!empty($user)) {
                echo ucfirst($user['name']);
            } else {
                echo APP_TITLE;
            }
            ?>
        </title>
        <!-- Bootstrap 3.4.1 -->
        <link type="text/css" rel="stylesheet" href="libs/css/bootstrap.min.css"/>
        <!-- Bootstrap Datepicker 1.9.0 -->
        <link type="text/css" rel="stylesheet" href="libs/css/bootstrap-datepicker.min" />
        <link type="text/css" rel="stylesheet" href="libs/css/main.css" />
    </head>
    <body>
<?php if ($session->isUserLoggedIn(true)): ?>
            <header id="header">
                <div class="logo pull-left"> <? echo APP_TITLE; ?> </div>
                <div class="header-content">
                    <div class="header-date pull-left">
                        <strong>
    <?php
    date_default_timezone_set(APP_TIMEZONE);
    if ($_SESSION['lang'] === 'es') {
        setlocale(LC_ALL, 'es_MX.UTF-8');
        echo strftime("%d de %B del %Y");
    } else {
        echo date("F j, Y");
    }
    echo date(", g:i a");
    ?>
                        </strong>
                    </div>
                    <div class="pull-right clearfix">
                        <ul class="info-menu list-inline list-unstyled">
                            <li class="profile">
                                <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
                                    <img src="uploads/users/<?php echo $user['image']; ?>" alt="user-image" class="img-circle img-inline">
                                    <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="profile.php?id=<?php echo (int) $user['id']; ?>">
                                            <i class="glyphicon glyphicon-user"></i>
                                            <? echo PROFILE; ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="edit_account.php" title="edit account">
                                            <i class="glyphicon glyphicon-cog"></i>
                                            <? echo SETTINGS; ?>
                                        </a>
                                    </li>
                                    <li class="last">
                                        <a href="logout.php">
                                            <i class="glyphicon glyphicon-off"></i>
                                            <? echo LOGOUT; ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <div class="sidebar">
    <?php if ($user['user_level'] === '1'): ?>
                    <!-- admin menu -->
                    <?php include_once('admin_menu.php'); ?>

                <?php elseif ($user['user_level'] === '2'): ?>
                    <!-- Special user -->
                    <?php include_once('special_menu.php'); ?>

                <?php elseif ($user['user_level'] === '3'): ?>
                    <!-- User menu -->
                    <?php include_once('user_menu.php'); ?>

                <?php endif; ?>

            </div>
            <?php endif; ?>

        <div class="page">
            <div class="container-fluid">
