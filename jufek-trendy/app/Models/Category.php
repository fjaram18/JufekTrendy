<?php
//Autor: Katherin Valencia

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Category extends Model
{
    use HasFactory;

    //attributes name, description
    protected $fillable = [
        'name','description'
    ];
    
    public static function validate(Request $request)
    {
        $request->validate([
            "description" => "required",
            "name" => "required"
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

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function products()
    {
        return $this->hasMany(product::class);
    }
}