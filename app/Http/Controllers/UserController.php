<?php

namespace App\Http\Controllers;

use App\Models\NotificationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\OrderModel;
use App\Models\ProductWishlistModel;
use App\Models\ProductReview;

class UserController extends Controller
{
    public function dashboard(){

          $data['meta_title']='Dashboard';
          $data['meta_keywords'] ='';
          $data['meta_description']='';
          $data['TotalTodayOrder']=OrderModel::getUserTotalTodayOrder(Auth::user()->id);
          $data['TotalTodayPayments']=OrderModel::getUserTotalTodayPayments(Auth::user()->id);
          $data['TotalPayments']=OrderModel::getUserTotalPayments(Auth::user()->id);
          $data['TotalOrder']=OrderModel::getUserTotalOrder(Auth::user()->id);
//order status
          $data['TotalPending']=OrderModel::getUserTotalStatus(Auth::user()->id,0);
          $data['TotalInProgress']=OrderModel::getUserTotalStatus(Auth::user()->id,1);
    
          $data['TotalCompleted']=OrderModel::getUserTotalStatus(Auth::user()->id,3);
          $data['TotalCanceled']=OrderModel::getUserTotalStatus(Auth::user()->id,4);




    return view('user.dashboard',$data);
 }


   public function orders(Request $request) 
   {

     if(!empty($request->notif_id))
     {
       NotificationModel::updateReadNotif($request->notif_id);
     }

     $data['getOrders']=OrderModel::getUserRecord(Auth::user()->id);
     $data['meta_title']='Orders';
     $data['meta_keywords'] ='';
     $data['meta_description']='';
     
    return view('user.orders',$data);
  }
  public function order_detail($id)
  {
     $data['getOrderDetails']=OrderModel::getUserSingle(Auth::user()->id,$id);
     if(!empty($data['getOrderDetails']))
     {
          $data['meta_title']='Orders Details';
          $data['meta_keywords'] ='';
          $data['meta_description']='';
           return view('user.order_details',$data);

     }
     else{
          abort(404);
     }
    
     

  }
  public function notification(Request $request)
  {
     $data['getRecord']=NotificationModel::getRecordUser(Auth::user()->id);
     $data['meta_title']='Notifications';
     $data['meta_keywords'] ='';
     $data['meta_description']='';
     return view('user.notification',$data);

  }
 
  public function  change_password() 
   {

    
        $data['meta_title']='Change-Pass';
         $data['meta_keywords'] ='';
         $data['meta_description']='';
     
        
    return view('user.changepw',$data);
  }

  public function  update_password(Request $request)
  {
     $user=User::getSingle(Auth::user()->id);
     if(Hash::check($request->password,$user->password))
     {
          if($request->new_password==$request->c_password)
          {
               $user->password=Hash::make($request->new_password);
               $user->save();

          return redirect()->back()->with('success','Password Updated Successfully');

          }
          else
          {
          return redirect()->back()->with('warning','Make Sure To Write Matched Passwords !');

          }
     }
     else
         {
          
          return redirect()->back()->with('error','Wrong Credentials !');

          }
         }
  public function  edit_profile() 
  {

   
       $data['meta_title']='Edit Profile';
        $data['meta_keywords'] ='';
        $data['meta_description']='';
        $data['getRecord']=User::getSingle(Auth::user()->id);
       
   return view('user.editprofile',$data);
 }
 public function Update_Profile(Request $request)
 {
    $user=User::getSingle(Auth::user()->id);
     $user->name = trim($request->first_name);
     $user->last_name = trim($request->last_name);
     $user->company_name = trim($request->company_name);
     $user->country = trim($request->country);
     $user->address1 = trim($request->address1);
     $user->address2 = trim($request->address2);
     $user->city = trim($request->city);
     $user->state = trim($request->state);
     $user->zip = trim($request->zip);
     $user->tel = trim($request->tel);
    $user->save();

     return redirect()->back()->with('success','Profile Updated Successfully');

 }



  
 public function add_to_wishlist(Request $request)
 { 
     $check=ProductWishlistModel::CheckAlready($request->product_id,Auth::user()->id);
     if(empty($check))
     {
          $save= new ProductWishlistModel;
          $save->product_id=$request->product_id;
          $save->user_id=Auth::user()->id;
          $save->save();
          $json['is_wishlist']=1;
     }
     else
     {
          ProductWishlistModel::DeleteRecord($request->product_id,Auth::user()->id);
          $json['is_wishlist']=0;
     
     }
     $json['status']=true;
     echo json_encode($json);


 } 

 public function make_review(Request $request)
 {
    $save= new ProductReview;
    $save->product_id=trim($request->product_id);
    $save->user_id=Auth::user()->id;
    $save->order_id=trim($request->order_id);
    $save->rating=trim($request->rating);
    $save->review=trim($request->review);
    $save->save();
     
    
    return redirect()->back()->with('success',"Thank you for your Review ");

 }



}
