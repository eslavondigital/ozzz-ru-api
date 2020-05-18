<?php


namespace Eslavon\Ozzz;


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
     * @param string $method
     * @param array $parameters
     * @return string
     */
    public function post(array $parameters): string
    {
        $response =  $this->http_client->request('POST', $this->api_host, ['form_params' => $parameters]);
        return $response->getBody()->getContents();
    }
}