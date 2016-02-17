<?php

$type = filter_input(INPUT_POST, 'type');
$subtotal = filter_input(INPUT_POST, 'subtotal');
$customer_type = strtoupper($type);


switch ($cutomer_type){

    case 'R':
        if ($subtotal < 100) {
            $discount_percent = .0;
        } else if ($subtotal >= 100 && $subtotal < 250) {
            $discount_percent = .1;
        } else if ($subtotal >= 250 && $subtotal < 500) {
            $discount_percent = .25;
        } else if ($subtotal >= 500) {
            $discount_percent = .3;
        }
    
    case 'C':    
        $discount_percent = .2;
    
    case 'T':   
        if ($subtotal < 500){
            $discount_percent = .4;
        } else if ($subtotal >= 500){
            $discount_percent = .5;
        }
    default:
         $discount_percent = .1;
}

$discount_amount = $subtotal * $discount_percent;
$invoice_total = $subtotal - $discount_amount;

$percent = number_format(($discount_percent * 100));
$discount = number_format($discount_amount, 2);
$total = number_format($invoice_total, 2);

include 'invoice_total.php';

?>