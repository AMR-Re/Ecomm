<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSettingModel extends Model
{
    use HasFactory;
    protected $table='home_setting';

      static public function getSingle()
    {
        return self::find(1);
    }


    public function getPDI(){
        if(!empty($this->payment_delivery_image) && file_exists('upload/homesetting/'.$this->payment_delivery_image))
        {
            return url('upload/homesetting/'.$this->payment_delivery_image);
        }
        {
            return "";
        }
    }

    public function getSUI(){
        if(!empty($this->signup_image) && file_exists('upload/homesetting/'.$this->signup_image))
        {
            return url('upload/homesetting/'.$this->signup_image);
        }
        {
            return "";
        }
    }
}
