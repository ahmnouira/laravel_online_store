<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    // Model factories are helpful to automate the creation of dummy model records in the database.
    // use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int contains the product primary key(id)
     * $this->attributes['name'] - string - contains the product name 
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['image'] - string - contains the product image 
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['created_at'] - timestamp -contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     */


    // Laravel protects us against mass assignment. By default, we cannot create a new product by invoking
    // the create method and passing an array with multiple data that refers to our model attributes.
    protected $fillable = ['name', 'description', 'price', 'image'];


    public static function validate(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0", // must be numeric and greater than zero
            "image" => "image"
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        return $this->attributes['id'] = $id;
    }
    // The definition and use of getters and setters guarantee a unique access point to the model attributes.
    public function getName()
    {
        // Req: We need to display all products' names in uppercase over the entire application.
        return strtoupper($this->attributes['name']);
    }

    public function setName($name)
    {
        return $this->attributes['name'] = $name;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        return $this->attributes['description'] = $description;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        return $this->attributes['image'] = $image;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        return $this->attributes['price'] = $price;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        return $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updated_at)
    {
        return $this->attributes['updated_at'] = $updated_at;
    }
}
