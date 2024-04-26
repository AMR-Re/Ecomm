<?php

namespace App\Http\Controllers;

use App\Models\PagesModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 public function home(){

        $data['meta_title']='Ecommerce';
         $data['meta_keywords'] ='';
         $data['meta_description']='';
        
    return view('home',$data);
 }

 public function contact(){

   $data['meta_title']='Contact Us';
   $data['getRecord']=PagesModel::getRecord();

   
return view('pages.contact',$data);
}
public function about(){

   $data['meta_title']='About';
  
   
return view('pages.about',$data);
}
//footer
public function faq(){

   $data['meta_title']='FAQ';
  
   
return view('pages.faq',$data);
}
public function user_guide(){

   $data['meta_title']='user_guide';
  
   
return view('pages.user_guide',$data);
}public function payment_method(){

   $data['meta_title']='FAQ';
  
   
return view('pages.payment_method',$data);
}public function money_back_guarantee(){

   $data['meta_title']='FAQ';
  
   
return view('pages.money_back_guarantee',$data);
}public function returns(){

   $data['meta_title']='returns';
  
   
return view('pages.returns',$data);
}public function shipping(){

   $data['meta_title']='shipping';
  
   
return view('pages.shipping',$data);
}public function terms_and_conditions(){

   $data['meta_title']='terms_and_conditions';
  
   
return view('pages.terms_and_conditions',$data);
}
public function privacy_policy(){

   $data['meta_title']='privacy_policy';
  
   
return view('pages.privacy_policy',$data);
}
}
