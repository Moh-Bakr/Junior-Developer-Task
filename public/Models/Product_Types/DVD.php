<?php
require_once(__DIR__ . '/../ProductRequest.php');
require_once(__DIR__ . '/../Rules.php');

class DVD extends ProductRequest
{
    public $size, $Rules;

    public function __construct($data)
    {
        $this->Rules = new Rules();
        $this->size = trim($this->data['size']);
        $this->validate_size();
    }

    public function validate_size()
    {
        $validate = ['required', 'max', 'digits'];

        foreach ($validate as $vla) {
            // check if there is error it will break
            if ($this->Rules->$vla($this->size, "size")) {
                break;
            }
        }
    }
}
