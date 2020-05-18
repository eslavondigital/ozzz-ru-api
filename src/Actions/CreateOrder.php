<?php


namespace Eslavon\Ozzz\Actions;


class CreateOrder
{
    /**
     * JSON response
     * @var string $raw_body_data
     */
    private string $raw_body_data;

    /**
     * CreateOrder constructor.
     * @param object $request
     * @param string $api_key
     * @param int $id_services
     * @param string $link
     * @param int $quantity
     * @param string $custom_data
     */
    public function __construct(object $request, string $api_key, int $id_services, string $link, int $quantity, string $custom_data = "")
    {
        $parameters = ["api_token" => $api_key, "action" => "add", "package" => $id_services, "link" => $link, "quantity" => $quantity ];
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
        //string(18) "{"order":12689060}"
        //string(68) "{"errors":["Please specify less than or equal to maximum quantity"]}"
        //string(56) "{"errors":["Please specify at least minimum quantity."]}"
        //string(59) "{"errors":["You do not have enough funds to Place order."]}"
    }

    /**
     * Create Order
     * @return string
     */
    public function get(): string
    {
        $data = json_decode($this->raw_body_data);
        if (isset($data->errors)) {
            switch ($data->errors[0]) {
                case "Please specify less than or equal to maximum quantity";
                    $answer = "Ошибка! Колличество указано больше максимального!";
                    break;
                case "Please specify at least minimum quantity.";
                    $answer = "Ошибка! Колличество указано меньше минимального!";
                    break;
                case "You do not have enough funds to Place order.";
                    $answer = "У вас недостаточно средств для размещения заказа.";
                    break;
            }
        } elseif (isset($data->order)) {
            $answer = "Заказ создан! Номер заказа: ".$data->order;
        } else {
            $answer = "Ошибка сервера. Попробуйте позже!";
        }
        return $answer;
    }
}