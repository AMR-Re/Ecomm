<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;


class ProductModel extends Model
{
    use HasFactory;
    protected $table='product';
    
static public function getSingle($product_id)
{
 return self::find($product_id);
}
static public function getMyWishlist($user_id)
{
  $return =self::select('product.*','users.name as created_by_name','sub_category.name as subcategory_name',
  'sub_category.slug as subcategory_slug','category.name as category_name','category.slug as category_slug')
    ->join('users','users.id' ,'=','product.created_by')
    ->join('category','category.id' ,'=','product.category_id')
    ->join('sub_category','sub_category.id' ,'=','product.sub_category_id')
    ->join('product_wishlist','product_wishlist.product_id' ,'=','product.id')
    ->where('product_wishlist.user_id','=',$user_id)

    ->where('product.is_delete','=',0)
    ->where('product.status','=',0)
    ->groupBy('product.id')
    ->paginate(2);
  
  return $return;

}
static public function getRelatedProduct($product_id,$sub_category_id)
{
  $return =self::select('product.*','users.name as created_by_name',
  'sub_category.name as subcategory_name','sub_category.slug as subcategory_slug',
  'category.name as category_name','category.slug as category_slug')
  ->join('users','users.id' ,'=','product.created_by')
  ->join('category','category.id' ,'=','product.category_id')
  ->join('sub_category','sub_category.id' ,'=','product.sub_category_id')
  ->where('product.id','!=',$product_id)
  ->where('product.sub_category_id','=',$sub_category_id)
  ->where('product.is_delete','=',0)
  ->where('product.status','=',0)
  ->groupBy('product.id')
  ->limit(10)
  ->get();
 
  return $return;

}
static public function getProduct($category_id='',$subcategory_id='')
{
  $return =self::select('product.*','users.name as created_by_name','sub_category.name as subcategory_name','sub_category.slug as subcategory_slug','category.name as category_name','category.slug as category_slug')
  ->join('users','users.id' ,'=','product.created_by')
  ->join('category','category.id' ,'=','product.category_id')

  ->join('sub_category','sub_category.id' ,'=','product.sub_category_id');

  if(!empty($category_id))
  {
    $return =$return->where('product.category_id','=',$category_id);
  }
  if(!empty($subcategory_id))
  {
    $return =$return->where('product.sub_category_id','=',$subcategory_id);
  }
  if(!empty(Request::get('sub_category_id')))
  {
    
    $sub_category_id= rtrim(Request::get('sub_category_id'),',');
    $sub_category_id_array=explode(",",$sub_category_id);
    $return = $return->whereIn('product.sub_category_id',$sub_category_id_array);
  //  dd($sub_category_id);
  }

  else
  {
    if(!empty(Request::get('old_category_id')))
    {
      $return =$return->where('product.category_id','=',Request::get('old_category_id'));
    }
    if(!empty(Request::get('old_sub_category_id')))
    {
      $return =$return->where('product.sub_category_id','=',Request::get('old_sub_category_id'));
    }
  }
  if(!empty(Request::get('color_id')))
  {
    
    $color_id= rtrim(Request::get('color_id'),',');
    $color_id_array=explode(",",$color_id);
    $return = $return->join('product_color','product_color.product_id' ,'=','product.id');
    $return = $return->whereIn('product_color.color_id',$color_id_array);
    //dd($color_id);
  }
  if(!empty(Request::get('brand_id')))
  {
    
    $brand_id= rtrim(Request::get('brand_id'),',');
    $brand_id_array=explode(",",$brand_id);
    $return = $return->whereIn('product.brand_id',$brand_id_array);
    //dd($brand_id);
  }
  if(!empty(Request::get('start_price')) && !empty(Request::get('end_price')))
  {
    
    $start_price= str_replace('$','',Request::get('start_price'));
    $end_price= str_replace('$','',Request::get('end_price'));
     $return =$return-> where('product.price','>=',$start_price);
     $return =$return-> where('product.price','<=',$end_price);

  }
if(!empty(Request::get('q')))
{
  $return =$return-> where('product.title','like','%'.Request::get('q').'%');
 
}
elseif(!empty(Request::get('mobile-search')))
{
  $return =$return-> where('product.title','like','%'.Request::get('mobile-search').'%');
}
  $return =$return-> where('product.is_delete','=',0)
  -> where('product.status','=',0)
  ->groupBy('product.id')
  ->paginate(30);
 
  return $return;
}
static public function getRecord()
{
  return self::select('product.*','users.name as created_by_name')
  ->join('users','users.id' ,'=','product.created_by')
  ->orderby('product.id', 'desc')
  ->paginate(20);
}
static public function getSingleSlug($slug){

  return self::where('slug','=',$slug)
  -> where('product.is_delete','=',0)
  -> where('product.status','=',0)
  ->first();

}
static public function checkSlug($slug)
{
  return self::where('slug','=',$slug)->count();
}

static public function getImageSingle($product_id)
{
   return ProductImageModel::where('product_id','=', $product_id)->orderby('order_by','asc')->first();

}

 public function getColor(){
  return $this->hasMany(ProductColorModel::class,"product_id");
 }
  public function getSize(){
  return $this->hasMany(ProductSizeModel::class,"product_id");
  }
  public function getImage(){
    return $this->hasMany(ProductImageModel::class,"product_id")->orderby('order_by','asc');
    }
    public function getCategory(){
      return $this->belongsTo(CategoryModel::class,'category_id');
    }
    public function getSubCategory(){
      return $this->belongsTo(SubCategoryModel::class,'sub_category_id');
    }

    
    public function getProductTotalReview(){
      return $this->hasMany(ProductReview::class,'product_id')
       ->join('users','users.id','product_review.user_id')
       ->count();
    }
    static public function checkWishlist($product_id)
{
  return ProductWishlistModel::CheckAlready($product_id,Auth::user()->id);
}
}
