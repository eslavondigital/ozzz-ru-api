<?php


namespace Eslavon\Ozzz;


use Eslavon\Ozzz\Actions\Balance;
use Eslavon\Ozzz\Actions\CreateOrder;
use Eslavon\Ozzz\Actions\Services;
use Eslavon\Ozzz\Actions\StatusOrder;

class Api
{
    /**
     * API Base host
     */
    protected const API_HOST = 'https://ozzz.ru/api/v2';

    /**
     * Create Order Object
     * @var CreateOrder $create_order
     */
    protected CreateOrder $create_order;

    /**
     * Status Order Object
     * @var StatusOrder $status_order
     */
    protected StatusOrder $status_order;

    /**
     * Balance Object
     * @var Balance $balance
     */
    protected Balance $balance;

    /**
     * Services Object
     * @var Services $services
     */
    protected Services $services;

    /**
     * Request Object
     * @var Request $request
     */
    protected Request $request;

    /**
     * API Key
     * @var string $api_key;
     */
    protected string $api_key;

    public function __construct(object $http_client,$api_key)
    {
        $this->request = new Request($http_client, self::API_HOST);
        $this->api_key = $api_key;
    }

    /**
     * Get Object Balance
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
     * Get Object Services;
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
     * Get Object Status Order
     * @param int $order_id
     * @return StatusOrder
     */
    public function statusOrder(int $order_id): StatusOrder
    {
        if (isset($this->status_order) === false) {
            $this->status_order = new StatusOrder($this->request, $this->api_key, $order_id);
        }
        return $this->status_order;
    }

    /**
     * Get Object Create Order
     * @param int $order_id
     * @return CreateOrder
     */
    public function createOrder(int $id_services, string $link, int $quantity): CreateOrder
    {
        if (isset($this->create_order) === false) {
            $this->create_order = new CreateOrder($this->request, $this->api_key, $id_services, $link, $quantity);
        }
        return $this->create_order;
    }





}