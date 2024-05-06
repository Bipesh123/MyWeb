<?php
/**
 * Formats the amounts to be printed
 *
 * @param $amount
 * @return string
 */
function print_price($amount) {
    return number_format($amount, 2, '.', ',');
}
function print_money($amount) {
    return number_format($amount);
}
/**
 * Builds the routing link
 *
 * @param null $pageName
 * @param array $params
 * @return string
 */
function route($pageName = null, $params = []) {
    if(empty($pageName)) {
        $pageName = "home";
    }

    $link = home_url() . "/?page=" . $pageName;
    if(!empty($params)) {
        foreach($params as $key => $value) {
            $link .= "&$key=$value";
        }
    }
    return $link;
}

/**
 * Returns the home page or root url
 *
 * @return string
 */
function home_url() {
    return _ROOT_URL;
}

function admin_url() {
    return _ADMIN_URL;
}