<?php
require_once(__DIR__ . '/../ProductRequest.php');
require_once(__DIR__ . '/../Rules.php');

class Book extends ProductRequest
{
    public $weight, $Rules;

    public function __construct($data)
    {
        $this->Rules = new Rules();
        $this->weight = trim($this->data['weight']);
        $this->validate_weight();
    }

    public function validate_weight()
    {
        $validate = ['required', 'max', 'digits'];

        foreach ($validate as $vla) {
            // check if there is error it will break
            if ($this->Rules->$vla($this->weight, "weight")) {
                break;
            }
        }
    }
}