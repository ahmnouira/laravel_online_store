<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Admin Page - Products - Online Store";
        $viewData['products'] = Product::all();
        return view('admin.products.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0", // must be numeric and greater than zero
            "image" => "image"
        ]);

        // dd($request);
        echo $request->input('description');
        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        // In order to get the id of the product and image is not null.
        $newProduct->setImage('game.jpeg');
        $newProduct->save();
        if ($request->hasFile('image')) {
            $imageName = $newProduct->getId() . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }

        return back();
    }

    public function store2(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0", // must be numeric and greater than zero
            "image" => "image"
        ]);

        $creationData = $request->only([
            'name', 'description', 'price'
        ]);
        $creationData['image'] = 'submarine.png';
        Product::create($creationData);

        return back();
    }
}
