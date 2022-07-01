<?php

require_once(__DIR__ . '/../ProductRequest.php');
require_once(__DIR__ . '/../Rules.php');

class Furniture extends ProductRequest
{
    public $height, $width, $length, $Rules;

    public function __construct($data)
    {
        $this->Rules = new Rules();
        $this->length = trim($this->data['length']);
        $this->height = trim($this->data['height']);
        $this->width = trim($this->data['width']);
        $this->validate_HWL();
    }

    public function validate_HWL()
    {
        $this->Rules->Furniture($this->length, $this->height, $this->width);
    }
}
