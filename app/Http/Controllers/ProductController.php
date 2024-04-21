<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\ProductModel;
use App\Models\ColorModel;
use App\Models\BrandModel;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


   public function getProductSearch(Request $request)
   {
          $data['meta_title']='Search';
          $data['meta_keywords'] ='';
          $data['meta_description']='';
          $getProduct=ProductModel::getProduct();
          $page=0;
          if(!empty($getProduct->nextPageUrl()))
          {
            $parse_url=parse_url($getProduct->nextPageUrl());
            if(!empty($parse_url['query']))
            {
              parse_str($parse_url['query'],$getarray);
              $page=!empty($getarray['page'])? $getarray['page']:0;
            }
          }

          $data['page']=$page;

          $data['getProduct']=$getProduct;

        return view('product.list',$data);

   }
    public function getCategory($slug,$subslug='')
    {
  
      $getProductSingle = ProductModel::getSingleSlug($slug); 
  
      $getCategory = CategoryModel::getSingleSlug($slug);
       $getSubCategory = SubCategoryModel::getSingleSlug($subslug);
       $data['getColor']=ColorModel::getRecordActive();
       $data['getBrand']=BrandModel::getRecordActive();
         if(!empty($getProductSingle))
         {
          $data['meta_title']=$getProductSingle->title;
          $data['meta_description']=$getProductSingle->short_description;
       
         $data['getProduct']=$getProductSingle;
         $data['getRelatedProduct']=ProductModel::getRelatedProduct($getProductSingle->id,$getProductSingle->sub_category_id);
     
         return view('product.detail',$data);

         }
       elseif(!empty($getCategory) && !empty($getSubCategory) )
       {
         $data['meta_title']=$getSubCategory->meta_title;
         $data['meta_keywords'] =$getSubCategory->meta_keywords;
         $data['meta_description']=$getSubCategory->meta_description;
        $data['getCategory']=$getCategory;
        $data['getSubCategory']=$getSubCategory;
        $getProduct=ProductModel::getProduct($getCategory->id,$getSubCategory->id);
        $page=0;
        if(!empty($getProduct->nextPageUrl()))
        {
          $parse_url=parse_url($getProduct->nextPageUrl());
          if(!empty($parse_url['query']))
          {
            parse_str($parse_url['query'],$getarray);
            $page=!empty($getarray['page'])? $getarray['page']:0;
          }
        }

        $data['page']=$page;
        $data['getProduct']=$getProduct;
        $data['getSubCategoryFilter']=SubCategoryModel::getRecordSubCategory($getCategory->id);

        return view('product.list',$data);
       }
       else if(!empty($getCategory))
       {
          $data['getSubCategoryFilter']=SubCategoryModel::getRecordSubCategory($getCategory->id);
          $data['meta_title']=$getCategory->meta_title;
          $data['meta_keywords'] =$getCategory->meta_keywords;
          $data['meta_description']=$getCategory->meta_description;
          $getProduct=ProductModel::getProduct($getCategory->id);
          $page=0;
          if(!empty($getProduct->nextPageUrl()))
          {
            $parse_url=parse_url($getProduct->nextPageUrl());
            if(!empty($parse_url['query']))
            {
              parse_str($parse_url['query'],$getarray);
              $page=!empty($getarray['page'])? $getarray['page']:0;
            }
          }

          $data['page']=$page;

          $data['getProduct']=$getProduct;

          $data['getCategory']=$getCategory;
        return view('product.list',$data);
       }
       else
       {
         abort(404);
       }
     }
      public function getFilterProductAjax(Request $request){
        $getProduct=ProductModel::getProduct();
        $page=0;
        if(!empty($getProduct->nextPageUrl()))
        {
          $parse_url=parse_url($getProduct->nextPageUrl());
          if(!empty($parse_url['query']))
          {
            parse_str($parse_url['query'],$getarray);
            $page=!empty($getarray['page'])? $getarray['page']:0;
          }
        }

        $data['page']=$page;
         return response()->json([
          "page"=>$page,
          "status"=>true,
          "success"=>view("product._list",["getProduct"=>$getProduct,])->render(),
         ],200);

      }

  public function my_wishlist()
    {
      
      $data['meta_title']='My Wishlist';
      $data['meta_keywords'] ='';
      $data['meta_description']='';
      $data['getProduct']=ProductModel::getMyWishlist(Auth::user()->id);


      return view ('product.my_wishlist',$data);
    }
    }
