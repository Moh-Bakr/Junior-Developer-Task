<?php
require_once(__DIR__ . '/../Models/ProductRequest.php');

class ProductController extends ProductRequest
{

    public static function Index()
    {
        $products = parent::AllProducts();
        $request = Self::DeleteProduct();
        require_once(__DIR__ . '/../Views/components/product-list.php');
    }

    public static function CreateProduct()
    {
        require_once(__DIR__ . '/../Views/components/add-product.php');
    }

    public static function DeleteProduct()
    {
        ProductRequest::DeleteProducts();
    }

}








