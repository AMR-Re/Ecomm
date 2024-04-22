<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class OrderItemModel extends Model
{
    protected $table='orders_item';


    public function getProduct(){
        return $this->belongsTo(ProductModel::class,"product_id");
       }


       public function getReview($product_id ,$order_id)
       {
        return ProductReview::getReview($product_id ,$order_id,Auth::user()->id);

       }
    use HasFactory;
}
