<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemModel extends Model
{
    protected $table='orders_item';


    public function getProduct(){
        return $this->belongsTo(ProductModel::class,"product_id");
       }
    use HasFactory;
}
