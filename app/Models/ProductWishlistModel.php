<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWishlistModel extends Model
{
    use HasFactory;
    protected $table='product_wishlist';

    static public function getSingle($product_id)
{
 return self::find($product_id);
}
static public function DeleteRecord($product_id,$user_id)
{
  self::where('product_id','=',$product_id)->where('user_id','=',$user_id)
 ->delete();
}
 static public function CheckAlready($product_id,$user_id)
 {
    return self::where('product_id','=',$product_id)->where('user_id','=',$user_id)
    ->count();
 }
}
