<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table='orders';

    static function getSingle($id) 
     {
        return self::find($id);
        
    }
    static function getRecord()
    {
        $return = OrderModel::select('orders.*')
        ->where('is_payment','=',1)
        ->where('is_delete','=',0)
        ->orderby('id','desc')
        ->paginate(20);
        return $return;
    }

    use HasFactory;
}
