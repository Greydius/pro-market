<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['id','status','fio','user_id','specification','email','telephone','comment','city','address','postcode','delivery','payment_method','total_amout','region','delivery_address','code_nds_pay','register_code','name_company','address_company'];
	protected $guarded = [];

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('count');
    }
    public function getFullPrice() {
        $fullPrice = 0;
        foreach ($this->products as $product) {
            // dump($product->price);
            $price = $product->pivot->count * $product->price;
            $fullPrice += floatval($price);
        }
        // dd($fullPrice);
        return $fullPrice;
    }
    public function orderStatus() {
        return $this->belongsTo(OrderStatus::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

}
