<?php

// decomment the die() at the end of code for see the datas .

use Stripe\StripeClient;

require_once('../Class/Cart.php');
require_once ('../../../vendor/autoload.php');
require_once('secrets.php');

$cart = new Cart();
$productsToBuy = $cart->getProductsCart($_POST);

echo 'var_dump $_POST : ';
var_dump($_POST); // data from POST 
echo 'var_dump $_POST transformated : ';
var_dump($productsToBuy); // products in the cart transformated for checkout

$stripeObject = new StripeClient($stripeSecretKey);

// // test with a product which is retrieved from the management of its products on the stripe account
// try {
//     $session_checkout = $stripeObject->checkout->sessions->create([
//         'success_url' => getBaseUrl().'success.php',
//         'cancel_url' => getBaseUrl(),
//         'line_items' => [
//             [
//                 'price' => 'price_1OZBukLF8qtlknccTOhL0c4Y',
//                 'quantity' => 2,
//             ],
//         ],
//         'mode' => 'payment',
//     ]);
// } catch (\Stripe\Exception\ApiErrorException $e) {
//     echo 'Erreur Stripe : ' . $e->getMessage();
// }

// test with the list of products in the cart
$lineItems = [];
foreach ($productsToBuy as $product) {
    $picUrl = urlencode(getBaseUrl().'/../../public/pics/products/'.$product['pic']);
    $array = [
        'quantity' => intval($product['quantity']),
        'price_data' => [
            'currency' => 'eur',
            'unit_amount' => intval($product['price'] * 100),
            'product_data' => [
                'name' => $product['name'],
                'description' => $product['desc'],
                'images' => [$picUrl], // the url of images dont work, because the site is in localhost
            ],
        ],
    ];
    array_push($lineItems, $array);
}

// the visual of the items that will be added during the checkout session
echo 'Items to add in the checkout session :';
echo '<pre>';
print_r($lineItems);
echo '</pre>';

try {

    // save the payment in datatbase ....
    // and return the id of payment in the succes url (payment succes) and cancel_url (for delete payment echec)
    
    $idCart = 12;

    $session_checkout = $stripeObject->checkout->sessions->create([
        'success_url' => getBaseUrl()."/../../success.php?idCart=$idCart&status=success", 
        'cancel_url' => getBaseUrl()."/../../?idCart=$idCart&status=echec", 
        'line_items' => $lineItems,
        'mode' => 'payment',
    ]);
} catch (\Stripe\Exception\ApiErrorException $e) {
    echo 'Erreur Stripe : ' . $e->getMessage();
}

echo 'var_dump object session checkout stripe :';
var_dump($session_checkout); 

// die(); // decoment this lines for see the checkout session and datas

// redirect with JS because PHP cant do it (headers already sent)
echo '<script>';
echo 'window.location.href = "' . $session_checkout->url . '";';
echo '</script>';



