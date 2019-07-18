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
if (!$session->isUserLoggedIn(true)) {
    redirect('index.php', false);
}
?>

<?php

// Auto suggetion
$html = '';
if (isset($_POST['product_name']) && strlen($_POST['product_name'])) {
    $products = find_product_by_title($_POST['product_name']);
    if ($products) {
        foreach ($products as $product):
            $html .= "<li class=\"list-group-item\">";
            $html .= $product['name'];
            $html .= "</li>";
        endforeach;
    } else {

        $html .= '<li onClick=\"fill(\'' . addslashes() . '\')\" class=\"list-group-item\">';
        $html .= 'Not found';
        $html .= "</li>";
    }

    echo json_encode($html);
}
?>
<?php

// find all product
if (isset($_POST['p_name']) && strlen($_POST['p_name'])) {
    $product_title = remove_junk($db->escape($_POST['p_name']));
    $results = find_all_product_info_by_title($product_title);
    if ($results) {
        foreach ($results as $result) {

            $html .= "<tr>";

            $html .= "<td id=\"s_name\">" . $result['name'] . "</td>";
            $html .= "<input type=\"hidden\" name=\"s_id\" value=\"{$result['id']}\">";
            $html .= "<td>";
            $html .= "<input type=\"text\" class=\"form-control\" name=\"price\" value=\"{$result['sale_price']}\">";
            $html .= "</td>";
            $html .= "<td id=\"s_qty\">";
            $html .= "<input type=\"text\" class=\"form-control\" name=\"quantity\" value=\"1\">";
            $html .= "</td>";
            $html .= "<td>";
            $html .= "<input type=\"text\" class=\"form-control\" name=\"total\" value=\"{$result['sale_price']}\">";
            $html .= "</td>";
            $html .= "<td>";
            $html .= "<input type=\"date\" class=\"form-control datePicker\" name=\"date\" data-date data-date-format=\"yyyy-mm-dd\">";
            $html .= "</td>";
            $html .= "<td>";
            $html .= "<button type=\"submit\" name=\"add_sale\" class=\"btn btn-primary\">Add sale</button>";
            $html .= "</td>";
            $html .= "</tr>";
        }
    } else {
        $html = '<tr><td>' . PRODUCT_NAME_NOT_REGISTER_IN_DATABASE . '</td></tr>';
    }

    echo json_encode($html);
}
?>
