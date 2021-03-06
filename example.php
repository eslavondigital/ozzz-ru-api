<?php
require_once __DIR__ . '/vendor/autoload.php';

use Eslavon\Ozzz\Api;

$api_key = '$2y$10$SzzWhi8Nc0suv';
$api = new Api(new GuzzleHttp\Client(), $api_key);

# Balance sheet data
# Get raw body data
$raw_body_data = $api->balance()->getRawBodyData(); // string
# Get amount balance
$balance = $api->balance()->getAmount(); // float
# Get currency
$currency = $api->balance()->getCurrency(); // string


# Get a list of services with a description
# Get raw body data
$raw_body_data = $api->services()->getRawBodyData(); // string
# Get the result as an array
$array_list_services = $api->services()->get(); // array

# Work with orders
# Create Order
$id_services = 112;
$link = "https://t.me/eslavon";
$quantity = 10;
$order  = $api->order()->create( $id_services, $link, $quantity); // object
# Status Order
$status = $api->order()->status(12707918); // object
# Cancel Order
$cancel = $api->order()->cancel(12707918); //object

