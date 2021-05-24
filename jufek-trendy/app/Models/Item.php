<?php
//Autor: Juan Camilo Echeverri

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Item extends Model
{
    use HasFactory;

    //attributes id, amount, subtotal, order_id, product_id, customization_id created_at, updated_at
    protected $fillable = [
        'amount','subtotal', 'order_id', 'product_id', 'customization_id'
    ];
    
    public static function validate(Request $request)
    {
        $request->validate([
            "amount" => "required|numeric|gt:0",
            "subtotal" => "required|numeric|gt:0"
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

    public function getAmount()
    {
        return $this->attributes['amount'];
    }

    public function setAmount($amount)
    {
        $this->attributes['amount'] = $amount;
    }

    public function getSubtotal()
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal($subtotal)
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($order_id)
    {
        $this->attributes['order_id'] = $order_id;
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($product_id)
    {
        $this->attributes['product_id'] = $product_id;
    }

    public function getCustomizationId()
    {
        return $this->attributes['customization_id'];
    }

    public function setCustomizationId($customization_id)
    {
        $this->attributes['customization_id'] = $customization_id;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customization()
    {
        return $this->belongsTo(Customization::class);
    }
}
