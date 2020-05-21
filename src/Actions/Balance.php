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


/**
 * Class Balance
 * @package Eslavon\Ozzz\Actions
 */
class Balance
{
    /**
     * Raw body data (JSON).
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
     * Get raw body data.
     * @return string
     */
    public function getRawBodyData(): string
    {
        return $this->raw_body_data;
    }

    /**
     * Get balance.
     * @return float
     */
    public function getAmount(): float
    {
        $data = json_decode($this->getRawBodyData());
        return $data->balance;
    }

    /**
     * Get currency.
     * @return string
     */
    public function getCurrency(): string
    {
        $data = json_decode($this->getRawBodyData());
        return $data->currency;
    }
}