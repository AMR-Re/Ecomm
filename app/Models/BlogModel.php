<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use App\Models\BlogCategoryModel;
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
   
   static  public function getRelated($blog_category_id,$blog_id) 
    {
        $return= self::select('blog.*');
        
        $return=$return->where('blog.is_delete','=',0)
        ->where('blog.blog_category_id','=',$blog_category_id)
        ->where('blog.id','!=',$blog_id)
        ->orderby('blog.total_views','desc')
        ->where('blog.status','=',0)
        ->limit(5)
        ->get();

      return $return;
   }

   public function getComment(){
    return $this->hasMany(BlogCommentModel::class,'blog_id')
                ->select('blog_comment.*')
                ->join('users','users.id','=','blog_comment.user_id')
                ->orderBy('blog_comment.created_at','desc');
}
public function getCommentCount(){
    return $this->hasMany(BlogCommentModel::class,'blog_id')
                ->select('blog_comment.id')
                ->join('users','users.id','=','blog_comment.user_id')
                ->count();
}
}
