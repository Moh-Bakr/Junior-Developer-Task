<?php
require_once(__DIR__ . '/Controllers/ProductController.php');

Route::resource('/', function () {
    ProductController::Index();
});

Route::resource('/add-product', function () {
    ProductController::CreateProduct();
});


class Route
{
    public static $routes = [];

    public static function resource($uri, $action)
    {
        self::$routes[] = $uri;
        if ($_SERVER['REQUEST_URI'] == $uri) {
            $action->__invoke();
        }
    }
}
