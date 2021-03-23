<?php
//Autor: Juan Camilo Echeverri

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    //attributes id, name, size, stock, price, image, description, created_at, updated_at
    protected $fillable = [
        'name', 'size', 'stock', 'price', 'image', 'description',
    ];

    public static function validate(Request $request)
    {
        $request->validate([
            "name" => "required",
            "size" => "required",
            "stock" => "required|numeric|gt:-1",
            "price" => "required|numeric|gt:0",
            "image" => "nullable",
            "description" => "nullable",
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getSize()
    {
        return $this->attributes['size'];
    }

    public function setSize($size)
    {
        $this->attributes['size'] = $size;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getStock()
    {
        return $this->attributes['stock'];
    }

    public function setStock($stock)
    {
        $this->attributes['stock'] = $stock;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function customizations()
    {
        return $this->hasMany(Customization::class);
    }
}
