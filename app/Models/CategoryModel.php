<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table='category';
    
    static public  function getSingle($id)
    {
        return  self::find($id);
    } 
    static public  function getSingleSlug($slug)
    {
        return  self::where('slug','=',$slug)
                    ->where('category.status','=',0)
                    ->where('category.is_delete','=',0)
                    ->first();
    } 

   static public function getRecord() 
    {
         return self::select('category.*','users.name as created_by_name')
          ->join('users','users.id' ,'=','category.created_by')
          ->where('category.is_delete','=',0)
          ->orderby('category.id','desc')
          ->get();
        
    }
   
    static public function getRecordActive() 
    {
         return self::select('category.*')
          ->join('users','users.id' ,'=','category.created_by')
          ->where('category.is_delete','=',0)
          ->where('category.status','=',0)
          ->orderby('category.name','asc')
          ->get();
        
    }
    static public function getRecordActiveHome() 
    {
         return self::select('category.*')
          ->join('users','users.id' ,'=','category.created_by')
          ->where('category.is_delete','=',0)
          ->where('category.status','=',0)
          ->where('category.is_home','=',1)
          ->orderby('category.id','asc')
          ->get();
        
    }
    static public function getRecordMenu() 
    {
         return self::select('category.*')
          ->join('users','users.id' ,'=','category.created_by')
          ->where('category.status','=',0)
          ->get();
        
    }
    public function getSubCategory(){
        return $this->hasMany(SubCategoryModel::class,"category_id")->where('sub_category.status','=',0)
        ->where('sub_category.is_delete','=',0);
       }

       public function getImage(){
        if(!empty($this->image_name) && file_exists('upload/category/'.$this->image_name))
        {
            return url('upload/category/'.$this->image_name);
        }
        {
            return "";
        }
    }
}
