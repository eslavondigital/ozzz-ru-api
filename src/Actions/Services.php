<?php


namespace Eslavon\Ozzz\Actions;


class Services
{
    /**
     * JSON response
     * @var string $raw_body_data
     */
    private string $raw_body_data;

    /**
     * Services constructor.
     * @param object $request
     * @param string $api_key
     */
    public function __construct(object $request, string $api_key)
    {
        $parameters = ["api_token" => $api_key, "action" => "packages" ];
        $result = $request->post($parameters);
        $this->raw_body_data = $result;
    }

    /**
     * Get raw body data
     * @return string
     */
    public function getRawBodyData(): string
    {
        return $this->raw_body_data;
    }

    /**
     * Get Services List
     * @return array
     */
    public function get(): array
    {
        $data = json_decode($this->getRawBodyData(), true);
        return $data;
    }
}