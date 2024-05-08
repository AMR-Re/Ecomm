<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerModel extends Model
{
    use HasFactory;
    protected $table='partner';

    static public  function getSingle($id)
    {
        return  self::find($id);
    } 
    static public function getRecord() 
    {
         return self::select('partner.*')
          ->where('partner.is_delete','=',0)
          ->orderby('partner.id','desc')
          ->paginate(20);
        
    }
    static public function getRecordActive() 
    {
         return self::select('partner.*')
          ->where('partner.is_delete','=',0)
          ->where('partner.status','=',0)
          ->orderby('partner.id','asc')
          ->get();
        
    }
    public function getImage(){
        if(!empty($this->image_name) && file_exists('upload/partner/'.$this->image_name))
        {
            return url('upload/partner/'.$this->image_name);
        }
        {
            return "";
        }
    }
   
}
