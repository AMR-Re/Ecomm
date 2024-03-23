<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingChargeModel extends Model
{
    use HasFactory;
    protected $table='shipping_charge';

    static public  function getSingle($id)
    {
        return  self::find($id);
    } 
    static public function getRecord() 
    {
         return self::select('shipping_charge.*')
          ->where('shipping_charge.is_delete','=',0)
          ->orderby('shipping_charge.id','desc')
          ->paginate(20);
        
    }
    static public function getRecordActive() 
    {
         return self::select('shipping_charge.*')
          ->where('shipping_charge.is_delete','=',0)
          ->where('shipping_charge.status','=',0)
          ->orderby('shipping_charge.id','asc')
          ->get();
        
    }
   
   
}
