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
 ```
 
 
 ## Documentation
 - [https://ozzz.ru/api](https://ozzz.ru/api)

 
 ## Support Eslavon Digital Financially
 Get supported Eslavon Digital and help fund the project.
 
 **Yandex.Money:** 410016014512747
 
 **QIWI:** https://qiwi.com/n/ESLAVON
 
 ### Author
 
 Vinogradov Victor - <eslavon.work.victor@gmail.com> - <https://vk.com/winogradow.wiktor><br />
 
 ### License
 
 All Elavon Digital products are licensed under the MIT license - see the `LICENSE` file for details

