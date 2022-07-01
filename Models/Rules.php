<?php
require_once(__DIR__ . '/RulesInterface.php');
require_once(__DIR__ . '/Product_Types/Furniture.php');

class Rules implements iRules
{
    public $errors = [];
    public function required($val, $key)
    {
        if (empty($val)) {
            $this->addError($key, "$key is required");
            return true;
        }
    }

    public function regular_expression($val, $key)
    {
        $rule = '/^[a-zA-Z0-9_ -]+$/';
        if (!preg_match($rule, $val)) {
            $this->addError($key, "only letters, numbers and ( _ or - ) are Allowed");
            return true;
        }
    }

    public function max($val, $key)
    {
        $max = 30;
        if (strlen($val) > $max) {
            $this->addError($key, "$key must not exceed $max char");
            return true;
        }
    }

    public function unique($val, $key)
    {
        $sql = "SELECT COUNT(*) sku from products WHERE sku ='" . $val . "'";
        $database = new database();
        $db = $database->getConnection();
        $count = $db->prepare($sql);
        $count->execute();
        if ($count->fetchColumn() > 0) {
            $this->addError($key, "$key already exists , must be unique");
            return true;
        }
    }

    public function digits($val, $key)
    {
        if (!is_numeric($val)) {
            $this->addError($key, "$key must be a number");
            return true;
        }
    }

    public function Furniture($length, $height, $width)
    {
        $validate = ['required', 'max', 'digits'];

        foreach ($validate as $vla) {
            if ($this->$vla($length, "length")) {
                break;
            }
        }

        foreach ($validate as $vla) {
            if ($this->$vla($height, "height")) {
                break;
            }
        }

        foreach ($validate as $vla) {
            if ($this->$vla($width, "width")) {
                break;
            }
        }
    }

    public function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}
