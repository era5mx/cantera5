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

include_once('includes/load.php');
if (isset($_SESSION['lang']) && $_SESSION['lang'] != ' ') {
    include(!file_exists('includes/lang/lang_' . $_SESSION['lang'] . '.php') ? 'includes/lang/lang_en.php' : 'includes/lang/lang_' . $_SESSION['lang'] . '.php' );
}
?>
<?php

$req_fields = array('username', 'password');
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

if (empty($errors)) {
    $user_id = authenticate($username, $password);
    if ($user_id) {
        //create session with id
        $session->login($user_id);
        //Update Sign in time
        updateLastLogIn($user_id);
        $user = current_user();

        $session->msg("s", HELLO . $user['name'] . ", ". WELCOME.A.APP_TITLE . ".");
        redirect('home.php', false);
    } else {
        $session->msg("d", SORRY.USERNAME_PASSWORD_INCORRECT);
        redirect('index.php', false);
    }
} else {
    $session->msg("d", $errors);
    redirect('index.php', false);
}
?>
