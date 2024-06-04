<?php

require_once __DIR__ . '/../models/Product.php'; // Asegúrate de incluir el archivo de modelo

class ProductController {
    public function index()
    {
        // Aquí obtienes los productos de la base de datos
        $productModel = new Product(); // Instancia del modelo de producto
        $products = $productModel->getAllProducts(); // Por ejemplo

        // Luego, pasas los productos a la vista
        require 'views/product_list.php';
    }
}
