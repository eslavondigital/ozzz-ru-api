<?php


namespace Eslavon\Ozzz\Actions;


class StatusOrder
{
    /**
     * JSON response
     * @var string $raw_body_data
     */
    private string $raw_body_data;

    /**
     * StatusOrder constructor.
     * @param object $request
     * @param string $api_key
     * @param int $id_order
     */
    public function __construct(object $request, string $api_key, int $id_order)
    {
        $parameters = ["api_token" => $api_key, "action" => "status", "order" => $id_order ];
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
        //string(28) "{"errors":"Order not found"}"
        //string(75) "{"status":"Inprogress","start_counter":null,"remains":"10","charge":"1.25"}" Выполняется
        // string(74) "{"status":"Completed","start_counter":"173","remains":"0","charge":"1.25"}" // Выполнен
    }

    /**
     * Get Order Status
     * @return string
     */
    public function get(): string
    {
        $data = json_decode($this->raw_body_data);
        if (isset($data->errors)) {
            $answer = "Заказ не найден в системе";
        } else {
            switch ($data->status) {
                case "Inprogress";
                    $answer = "Выполняется\nСтоимость: ".$data->charge;
                    break;
                case "Completed";
                    $answer = "Завершен\nСтоимость: ".$data->charge;
                    break;
                case "Cancelled";
                    $answer = "Отменен\nСтоимость: ".$data->charge;
                    break;
                case "Pending";
                    $answer = "Запускается\nСтоимость: ".$data->charge;
                    break;
            }
        }
        return $answer;
    }
}