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
$req_fields = array('username', 'password');
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

if (empty($errors)) {

    $user = authenticate_v2($username, $password);

    if ($user):

        if (isset($user['lang']) && $user['lang'] != ' ') {
            $_SESSION['lang'] = remove_junk(strtolower($user['lang']));
        }

        //create session with id
        $session->login($user['id']);

        //Update Sign in time
        updateLastLogIn($user['id']);
        $user = current_user();
        
        // redirect user to group home page by user level
        $session->msg("s", HELLO . $user['name'] . ", ". WELCOME.A.APP_TITLE . ".");
        if ($user['user_level'] === '1'):
            redirect('admin.php', false);
        elseif ($user['user_level'] === '2'):
            redirect('special.php', false);
        else:
            redirect('home.php', false);
        endif;

    else:
        $session->msg("d", SORRY.USERNAME_PASSWORD_INCORRECT);
        redirect('index.php', false);
    endif;
} else {

    $session->msg("d", $errors);
    redirect('login_v2.php', false);
}
?>
