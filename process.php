<?php

require_once('stripe/lib/Stripe.php');

Stripe::setApiKey("sk_test_FfDhTSC4yugDD4IJLnffrVEd");

// get the credit card details submitted by the form
$token = $_POST['stripeToken'];

// create a Customer
$customer = Stripe_Customer::create(array(
        "card" => $token,
        "description" => "payinguser@example.com"
    )
);

// charge the Customer instead of the card
$return = Stripe_Charge::create(array(
        "amount" => 1000, # amount in cents, again
        "currency" => "usd",
        "customer" => $customer->id)
);

print_r($return);exit;

// second time charging
/*Stripe_Charge::create(array(
        "amount" => 1500, # $15.00 this time
        "currency" => "usd",
        "customer" => $customer->id)
);*/
