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

$errors = array();

/* -------------------------------------------------------------- */
/* Function for Remove escapes special
  /* characters in a string for use in an SQL statement
  /*-------------------------------------------------------------- */

function real_escape($str) {
    global $con;
    $escape = mysqli_real_escape_string($con, $str);
    return $escape;
}

/* -------------------------------------------------------------- */
/* Function for Remove html characters
  /*-------------------------------------------------------------- */

function remove_junk($str) {
    $str2 = htmlspecialchars(strip_tags(nl2br($str), ENT_QUOTES));
    return $str2;
}

/* -------------------------------------------------------------- */
/* Function for Uppercase first character
  /*-------------------------------------------------------------- */

function first_character($str) {
    $val = ucfirst(str_replace('-', " ", $str));
    return $val;
}

/* -------------------------------------------------------------- */
/* Function for Checking input fields not empty
  /*-------------------------------------------------------------- */

function validate_fields($var) {
    global $errors;
    foreach ($var as $field) {
        $val = remove_junk($_POST[$field]);
        if (isset($val) && $val == '') {
            $errors = THE_FIELD . '\''. $field .'\''. CANT_BE_BLANK;
            return $errors;
        }
    }
}

/* -------------------------------------------------------------- */
/* Function for Display Session Message
  /* Ex echo displayt_msg($message);
  /*-------------------------------------------------------------- */

function display_msg($msg = '') {
    $output = array();
    if (!empty($msg)) {
        foreach ($msg as $key => $value) {
            $output = "<div class=\"alert alert-{$key}\">";
            $output .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
            $output .= remove_junk(first_character($value));
            $output .= "</div>";
        }
        return $output;
    } else {
        return "";
    }
}

/* -------------------------------------------------------------- */
/* Function for redirect
  /*-------------------------------------------------------------- */

function redirect($url, $permanent = false) {
    if (headers_sent() === false) {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

/* -------------------------------------------------------------- */
/* Function for find out total saleing price, buying price and profit
  /*-------------------------------------------------------------- */

function total_price($totals) {
    $sum = 0;
    $sub = 0;
    foreach ($totals as $total) {
        $sum += $total['total_saleing_price'];
        $sub += $total['total_buying_price'];
        $profit = $sum - $sub;
    }
    return array($sum, $profit);
}

/* -------------------------------------------------------------- */
/* Function for Readable date time
  /*-------------------------------------------------------------- */

function read_date($str) {
    if ($str) {
        return date('F j, Y, g:i:s a', strtotime($str));
    } else {
        return null;
    }
}

/* -------------------------------------------------------------- */
/* Function for  Readable Make date time
  /*-------------------------------------------------------------- */

function make_date() {
    return strftime("%Y-%m-%d %H:%M:%S", time());
}

/* -------------------------------------------------------------- */
/* Function for  Readable date time
  /*-------------------------------------------------------------- */

function count_id() {
    static $count = 1;
    return $count++;
}

/* -------------------------------------------------------------- */
/* Function for create random string
  /*-------------------------------------------------------------- */

function randString($length = 5) {
    $str = '';
    $cha = "0123456789abcdefghijklmnopqrstuvwxyz";

    for ($x = 0; $x < $length; $x++) {
        $str .= $cha[mt_rand(0, strlen($cha))];
    }
    return $str;
}

/* -------------------------------------------------------------- */
/* Function for create page title string
  /*-------------------------------------------------------------- */

function getPageTitle($str) {
    $strr = APP_TITLE;
    if ($str) {
        $strr .= ' - ' . $str;
    }
    return $strr;
}

?>
