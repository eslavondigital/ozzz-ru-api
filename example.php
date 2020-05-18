<?php
require_once __DIR__ . '/vendor/autoload.php';

use Eslavon\Ozzz\Api;

$api_key = '$2y$10$SzzWhi8Nc0suveMMcGh';
$api = new Api(new GuzzleHttp\Client(), $api_key);

// Get Balance
$balance = $api->balance()->get();

// Get List Services
$array_list_services = $api->services()->get();

// Create Order
$id_services = 112;
$link = "https://t.me/eslavon";
$quantity = 10;
$order_id = $api->createOrder($id_services, $link, $quantity);

//Get Status Order
$order_id = 12689060;
$status_order = $api->statusOrder($order_id)->get();