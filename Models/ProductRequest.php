<?php
require_once(__DIR__ . '/database.php');
require_once(__DIR__ . '/../Views/scripts/Autoload.php');


abstract class ProductRequest extends database
{
    private static $db_table = "products";
    public $sku, $name, $price, $type, $size, $weight, $height, $width, $length;

    public function __construct($data)
    {
        $this->sku = $data['sku'];
        $this->name = $data['name'];
        $this->price = $data['price'];
        $this->type = $data['type'];
        $this->size = $data['size'] ?? NULL;
        $this->weight = $data['weight'] ?? NULL;
        $this->height = $data['height'] ?? NULL;
        $this->width = $data['width'] ?? NULL;
        $this->length = $data['length'] ?? NULL;
    }


    public static function AllProducts()
    {
        $query = "SELECT * FROM " . self::$db_table . "";
        return database::EXCQuery($query);
    }

    public function CreateProducts()
    {
        return database::EXCQuery(
            "INSERT INTO " . self::$db_table .
                " (sku, name, price, type ,size, weight, height, width, length)
                    VALUES(:sku, :name, :price, :type, :size, :weight, :height, :width, :length)",
            [
                ':sku' => $this->sku,
                ':name' => $this->name,
                ':price' => $this->price,
                ':type' => $this->type,
                ':size' => $this->size,
                ':weight' => $this->weight,
                ':height' => $this->height,
                ':width' => $this->width,
                ':length' => $this->length,
            ]
        );
    }

    public static function DeleteProducts()
    {
        $products = $_POST['products'] ?? NULL;
        if ($products != NULL) {
            foreach ($products as $product) {
                $id = substr($product, 7, strlen($product) - 7);
                self::Delete(intval($id));
                Autoload::autoloader();
            }
        }
    }

    public static function Delete($id = NULL)
    {
        return database::EXCQuery("DELETE FROM products WHERE id=:id", [':id' => $id]);
    }
}
