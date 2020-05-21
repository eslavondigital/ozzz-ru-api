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

namespace Eslavon\Ozzz\Actions;


use Eslavon\Ozzz\Request;

/**
 * Class Order
 * @package Eslavon\Ozzz\Actions
 */
class Order
{
    /**
     * Request object.
     * @var Request $request
     */
    private Request $request;

    /**
     * API Key.
     * @var string $api_key;
     */
    private string $api_key;

    /**
     * Order constructor.
     * @param Request $request
     * @param string $api_key
     */
    public function __construct(Request $request, string $api_key)
    {
        $this->request = $request;
        $this->api_key = $api_key;
    }

    /**
     * Create new order.
     * @param int $id_services
     * @param string $link
     * @param int $quantity
     * @param string $custom_data - (Optional for some services)
     * @return object
     */
    public function create(int $id_services, string $link, int $quantity, string $custom_data = ""): object
    {
        $parameters = ["api_token" => $this->api_key, "action" => "add", "package" => $id_services, "link" => $link, "quantity" => $quantity, "custom_data" => $custom_data ];
        $result = $this->request->post($parameters);
        return json_decode($result);
    }

    /**
     * Get status order.
     * @param int $id_order
     * @return object
     */
    public function status(int $id_order): object
    {
        $parameters = ["api_token" => $this->api_key, "action" => "status", "order" => $id_order ];
        $result = $this->request->post($parameters);
        return json_decode($result);
    }

    /**
     * Cancel the order.
     * @param int $id_order
     * @return object
     */
    public function cancel(int $id_order): object
    {
        $parameters = ["api_token" => $this->api_key, "action" => "cancel", "order" => $id_order ];
        $result = $this->request->post($parameters);
        return json_decode($result);
    }

}