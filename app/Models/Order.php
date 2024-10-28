<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'product_id',
        'quantity',
        'status',
    ];
    public function Product(){

        return $this->belongsTo(Product::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }
}
