<?php


namespace Eslavon\Ozzz\Actions;


class Balance
{
    /**
     * JSON response
     * @var string $raw_body_data
     */
    private string $raw_body_data;

    /**
     * Balance constructor.
     * @param object $request
     * @param string $api_key
     */
    public function __construct(object $request, string $api_key)
    {
        $parameters = ["api_token" => $api_key, "action" => "balance" ];
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
     * Get balance
     * @return string
     */
    public function get(): string
    {
        $data = json_decode($this->getRawBodyData());
        return $data->balance." ".$data->currency;
    }
}