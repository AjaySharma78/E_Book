<?php
require('stripeconfig.php');
include("config.php");
if(isset($_POST['stripeToken']) && isset($_POST['grand_total'])){
    \Stripe\Stripe::setVerifySslCerts(false);

    $token = $_POST['stripeToken'];
    $item_total = $_POST['grand_total'];
   
    // Convert the amount to cents
    $amount_in_cents = $item_total * 100;

    $data = \Stripe\Charge::create(array(
        "amount" => $amount_in_cents,
        "currency" => "inr",
        "source" => $token,
        "description" => "Order from Online Food",
        "receipt_email" => "kalakafle456789@gmail.com"
    ));

    header('Location: shop.php');
    exit();
}
?>