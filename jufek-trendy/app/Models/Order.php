<?php
//Autor: Katherin Valencia

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Order extends Model
{
    use HasFactory;

    //attributes order_date, total, shipping_date, order_state, payment_type, user_id
    protected $fillable = [
        'order_date', 'total', 'shipping_date', 'order_state', 'payment_type', 'user_id'
    ];
    
    public static function validate(Request $request)
    {
        $request->validate([
            "total" => "required",
            "order_date" => "required",
            "shipping_date" => "required",
            "order_state" => "required",
            "payment_type" => "required"
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

    public function getDate()
    {
        return $this->attributes['order_date'];
    }

    public function setDate($order_date)
    {
        $this->attributes['order_date'] = $order_date;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    public function getShippingDate()
    {
        return $this->attributes['shipping_date'];
    }

    public function setShippindDate($shipping_date)
    {
        $this->attributes['shipping_date'] = $shipping_date;
    }

    public function getState()
    {
        return $this->attributes['order_state'];
    }

    public function setState($order_state)
    {
        $this->attributes['order_state'] = $order_state;
    }

    public function getPayment()
    {
        return $this->attributes['payment_type'];
    }

    public function setPayment($payment_type)
    {
        $this->attributes['payment_type'] = $payment_type;
    }

    
    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}