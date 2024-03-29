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

    use HasFactory;
}
