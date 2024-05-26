<?php

namespace App\Http\Controllers;

use App\Models\PagesModel;
use App\Models\SystemSettingModel;
use App\Models\ContactUsModel;
use App\Models\SliderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;
use App\Models\CategoryModel;
use App\Models\PartnerModel;
use App\Models\ProductModel;
use App\Models\BlogCategoryModel;
use App\Models\BLogModel;
use App\Models\BlogCommentModel;
use App\Models\HomeSettingModel;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
 public function home(){

        $data['meta_title']='Ecommerce';
         $data['meta_keywords'] ='';
         $data['meta_description']='';
         $data['getBlog']=BlogModel::getRecordActiveHome();
         $data['getSetting']=HomeSettingModel::getSingle();
        $data['getSlider']=SliderModel::getRecordActive();
        $data['getPartner']=PartnerModel::getRecordActive();
        $data['getCategory']=CategoryModel::getRecordActiveHome();
        $data['getProduct']=ProductModel::getRecentArrival();
        $data['getTrendyProduct']=ProductModel::getTrendyProduct();



    return view('home',$data);
 }
 
public function recent_arrival_category_product(Request $request){
   $getProduct=ProductModel::getRecentArrival();
   $getCategory=CategoryModel::getSingle($request->category_id);

   return response()->json([
    "status"=>true,
    "success"=>view("product._list_recent_arrival",
    ["getProduct"=>$getProduct,
    "getCategory"=>$getCategory,
    ])->render(),
   ],200);
}
 public function contact(){
   $first_num=mt_rand(0,5);
   $second_num=mt_rand(0,9);
   Session::put('total_sum',$first_num+$second_num);
   $data['first_num']=$first_num;
   $data['second_num']=$second_num;

   $data['meta_title']='Contact Us';
   $data['getSystemApp']=SystemSettingModel::getSingle();

   $data['meta_keywords'] ='';
   $data['meta_description']='';
   $data['getPage']=PagesModel::getSlug('contact');

   
return view('pages.contact',$data);
}
public function submit_contact(Request $request) 
 {
   if(!empty($request->verification) && !empty(Session::get('total_sum')))
   {
      if(trim(Session::get('total_sum')) == trim($request->verification))
         {
            $contactsubmit=new ContactUsModel();
            if(!empty(Auth::check()))
            {
               $contactsubmit->user_id=Auth::user()->id;
            
            }
            $contactsubmit->name=trim($request->name);
            $contactsubmit->email=trim($request->email);
            $contactsubmit->subject=trim($request->subject);
            $contactsubmit->phone=trim($request->phone);
            $contactsubmit->message=trim($request->message);
      
            $getSystemSetting=SystemSettingModel::getSingle();
      try {
         Mail::to($getSystemSetting->submit_email)->send(new ContactUsMail($contactsubmit));

      } catch (\Exception $e) {
         //throw $th;
      }
       
            $contactsubmit->save();
      
            return redirect()->back()->with('success',"Your message successfully sent!");
      
         }
      else
      {
         return redirect()->back()->with('error',"Your Verifacation Sum is Wrong!");
      }

   }
   else
   {
      return redirect()->back()->with('error',"Your Verifacation Sum is Wrong!");

   }
   

   
}
public function about()
{
   $getPage=PagesModel::getSlug('about');

   $data['getPage']=$getPage;
   $data['meta_title']=$getPage->meta_title;
   $data['meta_keywords'] =$getPage->meta_keywords;
   $data['meta_description']=$getPage->meta_description;
   
return view('pages.about',$data);
}
//footer
public function faq(){
   $getPage=PagesModel::getSlug('faq');
   $data['getPage']=$getPage;
   $data['meta_title']=$getPage->meta_title;
   $data['meta_keywords'] =$getPage->meta_keywords;
   $data['meta_description']=$getPage->meta_description;

  
   
return view('pages.faq',$data);
}
public function user_guide(){

   $getPage=PagesModel::getSlug('user_guide');
   $data['getPage']=$getPage;
   $data['meta_title']=$getPage->meta_title;
   $data['meta_keywords'] =$getPage->meta_keywords;
   $data['meta_description']=$getPage->meta_description;

   
return view('pages.user_guide',$data);
}
public function payment_method(){


   $getPage=PagesModel::getSlug('payment_method');
   $data['getPage']=$getPage;
   $data['meta_title']=$getPage->meta_title;
   $data['meta_keywords'] =$getPage->meta_keywords;
   $data['meta_description']=$getPage->meta_description;

   
return view('pages.payment_method',$data);
}
public function money_back_guarantee()
{

   $getPage=PagesModel::getSlug('money_back_guarantee');

   $data['getPage']=$getPage;
   $data['meta_title']=$getPage->meta_title;
   $data['meta_keywords'] =$getPage->meta_keywords;
   $data['meta_description']=$getPage->meta_description;
  
   
return view('pages.money_back_guarantee',$data);
}
public function returns(){
   $getPage=PagesModel::getSlug('returns');

   $data['getPage']=$getPage;
   $data['meta_title']=$getPage->meta_title;
   $data['meta_keywords'] =$getPage->meta_keywords;
   $data['meta_description']=$getPage->meta_description;
  
   
return view('pages.returns',$data);
}
public function shipping()
{
   $getPage=PagesModel::getSlug('shipping');

   $data['getPage']=$getPage;
   $data['meta_title']=$getPage->meta_title;
   $data['meta_keywords'] =$getPage->meta_keywords;
   $data['meta_description']=$getPage->meta_description;
  
   
return view('pages.shipping',$data);

}
public function terms_and_conditions()
{


   $getPage=PagesModel::getSlug('terms_and_conditions');
   $data['getPage']=$getPage;
   $data['meta_title']=$getPage->meta_title;
   $data['meta_keywords'] =$getPage->meta_keywords;
   $data['meta_description']=$getPage->meta_description;
   
return view('pages.terms_and_conditions',$data);
}
public function privacy_policy()
{

  
   $getPage=PagesModel::getSlug('privacy_policy');
   $data['getPage']=$getPage;
   $data['meta_title']=$getPage->meta_title;
   $data['meta_keywords'] =$getPage->meta_keywords;
   $data['meta_description']=$getPage->meta_description;
   
return view('pages.privacy_policy',$data);
}
public function blog()
{

  
   $getPage=PagesModel::getSlug('blog');
   $data['getPage']=$getPage;
   $data['meta_title']=$getPage->meta_title;
   $data['meta_keywords'] =$getPage->meta_keywords;
   $data['meta_description']=$getPage->meta_description;
   $data['getBlog']=BlogModel::getBlog();
   $data['getBlogCategory']=BlogCategoryModel::getBlogCategory();
   $data['getPopular'] = BlogModel::getPopular();

   
return view('blog.list',$data);
}
public function blog_detail($slug)
{

   $getBlog=BlogModel::getSingleSlug($slug);
   if(!empty($getBlog))
   {
      $total_views=$getBlog->total_views;
      $getBlog->total_views=$total_views+1;
      $getBlog->save();
      $data = [];
      $data['getBlog']=$getBlog;
      $data['meta_title']=$getBlog->meta_title;
      $data['meta_keywords'] =$getBlog->meta_keywords;
      $data['meta_description']=$getBlog->meta_description;
      $data['getPopular'] = BlogModel::getPopular();
      $data['getBlogCategory']=BlogCategoryModel::getBlogCategory();
      
      $data['getRelatedPost']=BlogModel::getRelated($getBlog->blog_category_id,$getBlog->id);
         return view('blog.detail',$data);
   }
   else
   {
      abort(404);
   }
   

}
public function blog_category($slug)
{
   
   $getCategory=BlogCategoryModel::getSingleSlug($slug);
   if(!empty($getCategory))
   {
      $data['getCategory']=$getCategory;
      $data['meta_title']=$getCategory->meta_title;
      $data['meta_keywords'] =$getCategory->meta_keywords;
      $data['meta_description']=$getCategory->meta_description;
      $data['getPopular'] = BlogModel::getPopular();
      $data['getBlogCategory']=BlogCategoryModel::getBlogCategory();
      $data['getBlog']=BLogModel::getBlog($getCategory->id);
         return view('blog.category',$data);
   }
   else
   {
      abort(404);
   }
   

}
public function submit_blog_comment(Request $request)
{
// dd($request->all());
$comment=new BlogCommentModel();
$comment->user_id=Auth::user()->id;
$comment->blog_id=trim($request->blog_id);
$comment->comment=trim($request->comment);
$comment->save();
return redirect()->back()->with('success',"Your comment successfully Posted");
}

}
