<?php
require_once(__DIR__ . '/ProductRequest.php');
require_once(__DIR__ . '/Product_Types/DVD.php');
require_once(__DIR__ . '/Product_Types/Book.php');
require_once(__DIR__ . '/Product_Types/Furniture.php');
require_once(__DIR__ . '/Rules.php');
require_once(__DIR__ . '/database.php');

class validator extends ProductRequest
{
    public $data;
    private $Rules;

    public function __construct($post_data)
    {
        $this->Rules = new Rules();
        $this->data = $post_data;
    }

    public function validateform()
    {
        $this->ValidateSku();
        $this->ValidateName();
        $this->ValidatePrice();
        $this->ProductType();

        if (empty($this->Rules->errors)) {
            parent::__construct($this->data);
            ProductRequest::CreateProducts();
            header('Location: ' . '/');
        }
        return $this->Rules->errors;
    }

    private function ValidateSku()
    {
        $val = trim($this->data['sku']);
        $validate = ['required', 'max', 'regular_expression', 'unique'];

        foreach ($validate as $vla) {
            // check if there is error it will break
            if ($this->Rules->$vla($val, "sku")) {
                break;
            }
        }
    }

    private function ValidateName()
    {
        $val = trim($this->data['name']);
        $validate = ['required', 'max', 'regular_expression'];

        foreach ($validate as $vla) {
            // check if there is error it will break
            if ($this->Rules->$vla($val, "name")) {
                break;
            }
        }
    }

    private function ValidatePrice()
    {
        $val = trim($this->data['price']);
        $validate = ['required', 'max', 'digits'];

        foreach ($validate as $vla) {
            // check if there is error it will break
            if ($this->Rules->$vla($val, "name")) {
                break;
            }
        }
    }

    private function ProductType()
    {
        $validators = [
            'DVD' => 'DVD',
            'Book' => 'Book',
            'Furniture' => 'Furniture',
        ];

        $val = trim($this->data['type']);

        if (!($this->Rules->required($val, "type"))) {
            $validatorClass = $validators[$val];
            $validator = new $validatorClass($this->data);
        }
        $this->Rules->addError('type', 'Type is Required');
    }
}
