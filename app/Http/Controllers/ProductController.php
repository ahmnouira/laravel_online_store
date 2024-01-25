<?php


namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public static $products = [
        [
            "id" => "1", "name" => "TV", "description" => "Best TV", "image" => "game.jpeg", "price" => "1000"
        ],
        [
            "id" => "2", "name" => "iPhone", "description" => "Best iPhone", "image" => "safe.png", "price" => "999"
        ],
        [
            "id" => "3", "name" => "Chromecast", "description" => "Best Chromecast", "image" => "submarine.png", "price" => "30"
        ],
        [
            "id" => "4", "name" => "Glasses", "description" => "Best Glasses", "image" => "game.jpeg", "price" => "100"
        ],
    ];

    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Products - Online Store";
        $viewData['subtitle'] = "List of products";
        // $viewData['products'] = ProductController::$products;
        $viewData['products'] = Product::all();
        return view('products.index')->with('viewData', $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        // $product = ProductController::$products[$id - 1];
        $product = Product::findOrFail($id);
        // $viewData["title"] = $product["name"] . " - Online Store";
        $viewData["title"] = $product->getName() . " - Online Store";
        // $viewData['subtitle'] = $product['name'] . "- Product information";
        $viewData['subtitle'] = $product->getName() . "- Product information";
        $viewData['product'] = $product;
        return view('products.show')->with("viewData", $viewData);
    }
}
