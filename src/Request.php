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

/**
 * Class Request
 * @package Eslavon\Ozzz
 */
class Request
{
    /**
     * Object http client
     * @var object $http_client
     */
    private object $http_client;

    /**
     * Host API
     * @var string $api_host
     */
    private string $api_host;

    /**
     * Request constructor.
     * @param object $http_client
     * @param string $api_host
     */
    public function __construct(object $http_client, string $api_host)
    {
        $this->http_client = $http_client;
        $this->api_host = $api_host;
    }

    /**
     * Send Post Request
     * @param array $parameters
     * @return string
     */
    public function post(array $parameters): string
    {
        $response =  $this->http_client->request('POST', $this->api_host, ['form_params' => $parameters]);
        return $response->getBody()->getContents();
    }
}