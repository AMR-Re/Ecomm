<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    use HasFactory;
    protected $table='slider';

    static public  function getSingle($id)
    {
        return  self::find($id);
    } 
    static public function getRecord() 
    {
         return self::select('slider.*')
          ->where('slider.is_delete','=',0)
          ->orderby('slider.id','desc')
          ->paginate(20);
        
    }
    static public function getRecordActive() 
    {
         return self::select('slider.*')
          ->where('slider.is_delete','=',0)
          ->where('slider.status','=',0)
          ->orderby('slider.id','asc')
          ->get();
        
    }
    public function getImage(){
        if(!empty($this->image_name) && file_exists('upload/slider/'.$this->image_name))
        {
            return url('upload/slider/'.$this->image_name);
        }
        {
            return "";
        }
    }
   
}
