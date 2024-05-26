<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSettting extends Model
{
    use HasFactory;
    protected $table='payment_setting';

    
    static public function getSingle()
    {
        return self::find(1);
    }
}
