# ozzz-ru-api
 <p align="center">
 <img src="https://img.shields.io/badge/PHP-%3E%3D7.4.2-%23green" alt="php version">
 <img src="https://img.shields.io/github/v/tag/eslavondigital/ozzz-ru-api?label=version" alt="Latest Stable Version">
 <img src="https://img.shields.io/github/license/eslavondigital/ozzz-ru-api" alt="License">
 </p> 
 API Ozzz.ru
 
 ## Installation
 
 Install the latest version with
 
 ```bash
 $ composer require eslavondigital/ozzz-ru-api
 ```
 

 ## Basic Usage
 
 ```php
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
$status = $api->order()->status(12707918); //object
# Cancel Order
$cancel = $api->order()->cancel(12707918); //object
 ```
 
 
 ## Documentation
 - [https://ozzz.ru/api](https://ozzz.ru/api)

 
 ## Support Eslavon Digital Financially
 Get supported Eslavon Digital and help fund the project.
 
 **Yandex.Money:** 410016014512747
 
 **QIWI:** https://qiwi.com/n/eslavon
 
 ### Author
 
 **Vinogradov Victor** - <eslavon.work.victor@gmail.com> - <https://vk.com/winogradow.wiktor><br />
 **Eslavon Digital** - <eslavondigital@gmail.com> - <https://vk.com/eslavon>
 
 ### License
 
 All Elavon Digital products are licensed under the MIT license - see the `LICENSE` file for details

