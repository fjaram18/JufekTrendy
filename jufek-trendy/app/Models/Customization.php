<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Customization extends Model

{
    //attributes id, name, size, location, price, timestamps
    protected $fillable = ['name', 'size', 'location', 'price'];

    public static function validate(Request $request)
    {
        $request->validate([

            "name" => "required|string",
            "size" => "required|integer|numeric|gt:0",
            "location" => "required|string",
            "price" => "required|numeric|gt:0"

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

    public function getLocation()
    {
        return $this->attributes['location'];
    }

    public function setLocation($location)
    {
        $this->attributes['location'] = $location;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function prodcuts()
    {
        return $this->hasMany(prodcut::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
