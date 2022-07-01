<?php

interface iRules
{
    public function required($val, $key);

    public function max($val, $key);

    public function unique($val, $key);

    public function regular_expression( $val, $key);

    public function digits($val, $key);

    public function Furniture($length, $height, $width);

    public function addError($key, $val);

}