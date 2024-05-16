<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
class BlogModel extends Model
{
    use HasFactory;
    protected $table='blog';


    static public  function getSingle($id)
    {
        return  self::find($id);
    } 
    static public  function getSingleSlug($slug)
    {
        return  self::where('slug','=',$slug)
                    ->where('blog.status','=',0)
                    ->where('blog.is_delete','=',0)
                    ->first();
    } 

   static public function getRecord() 
    {
         return self::select('blog.*')
          ->where('blog.is_delete','=',0)
          ->orderby('blog.id','desc')
          ->paginate(30);
        
    }
   
    static public function getRecordActive() 
    {
         return self::select('blog.*')
          ->where('blog.is_delete','=',0)
          ->where('blog.status','=',0)
          ->orderby('blog.name','asc')
          ->get();
        
    }
    static public function getBlog()
    {
        $return= self::select('blog.*');
        if(!empty(Request::get('search')))
        {
            $return=$return->where('blog.title','like','%'.Request::get('search').'%');

        }
        $return=$return->where('blog.is_delete','=',0)
        ->where('blog.status','=',0)
        ->orderby('blog.id','desc')
        ->paginate(8);

      return $return;

    }
    static public function getRecordActiveHome() 
    {
         return self::select('blog.*')
          ->where('blog.is_delete','=',0)
          ->where('blog.status','=',0)
          ->where('blog.is_home','=',1)
          ->orderby('blog.name','asc')
          ->get();
        
    }
    public function getImage(){
        if(!empty($this->image_name) && file_exists('upload/blog/'.$this->image_name))
        {
            return url('upload/blog/'.$this->image_name);
        }
        {
            return "";
        }
    }
    public function getCategory(){
        return $this->belongsTo(BlogCategoryModel::class,'blog_category_id');
    }
  static  public function getPopular() 
    {
        $return= self::select('blog.*');
        
        $return=$return->where('blog.is_delete','=',0)
        ->where('blog.status','=',0)
        ->orderby('blog.total_views','desc')
        ->limit(5)
        ->get();

      return $return;
   }
}
