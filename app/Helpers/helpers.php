<?php

if (!function_exists('convert_price')) {
    function convert_price($price)
    {
        $currency = session('currency', 'AED');
        switch ($currency) {
            case 'PKR':
                $rate = 75.59; 
                break;
            case 'AED':
            default:
                $rate = 1; 
                break;
        }
        return $price * $rate;
    }
}
