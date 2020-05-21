<?php
/**
 * Ozzz-ru-api  - Package for working with the Ozzz.ru site API
 * PHP Version 7.4.
 *
 * @see https://github.com/eslavondigital/ozzz-ru-api The Ozzz-ru-api GitHub project
 *
 * @author    Vinogradov Victor <eslavon.work.victor@gmail.com>
 * @author    Eslavon Digital <eslavondigital@gmail.com>
 * @copyright 2020 Vinogradov Victor
 * @copyright 2020 Eslavon Digital
 * @license   https://github.com/eslavondigital/ozzz-ru-api/blob/master/LICENSE MIT License
 * @note      This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

namespace Eslavon\Ozzz;


use Eslavon\Ozzz\Actions\Balance;
use Eslavon\Ozzz\Actions\Order;
use Eslavon\Ozzz\Actions\Services;

/**
 * Class Api
 * @package Eslavon\Ozzz
 */
class Api
{
    /**
     * API Base host.
     */
    protected const API_HOST = 'https://ozzz.ru/api/v2';

    /**
     * Balance object.
     * @var Balance $balance
     */
    protected Balance $balance;

    /**
     * Order object.
     * @var Order $order
     */
    protected Order $order;

    /**
     * Services object.
     * @var Services $services
     */
    protected Services $services;

    /**
     * Request object.
     * @var Request $request
     */
    protected Request $request;

    /**
     * API Key.
     * @var string $api_key;
     */
    protected string $api_key;

    /**
     * Api constructor.
     * @param object $http_client
     * @param $api_key
     */
    public function __construct(object $http_client,$api_key)
    {
        $this->request = new Request($http_client, self::API_HOST);
        $this->api_key = $api_key;
    }

    /**
     * Get Balance object.
     * @return Balance
     */
    public function balance(): Balance
    {
        if (isset($this->balance) === false) {
            $this->balance = new Balance($this->request, $this->api_key);
        }
        return $this->balance;
    }

    /**
     * Get Services object.
     * @return Services
     */
    public function services(): Services
    {
        if (isset($this->services) === false) {
            $this->services = new Services($this->request, $this->api_key);
        }
        return $this->services;
    }

    /**
     * Get Order object.
     * @return Order
     */
    public function order(): Order
    {
        if (isset($this->order) === false) {
            $this->order = new Order($this->request, $this->api_key);
        }
        return $this->order;
    }

}