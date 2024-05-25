<?php
/**
 * Redirect to a different page
 *
 * @param string $page The path to redirect to
 */
function redirect($page) {
    header('Location: ' . $page);
    exit;
}

/**
 * Sanitize input data
 *
 * @param string $data The data to sanitize
 * @return string The sanitized data
 */
function sanitize($data) {
    return htmlspecialchars(strip_tags($data));
}

/**
 * Display formatted prices
 *
 * @param float $number The price to format
 * @return string The formatted price
 */
function formatPrice($number) {
    return number_format($number, 2, '.', ',');
}
