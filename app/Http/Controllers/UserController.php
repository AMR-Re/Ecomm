<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\OrderModel;
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


   public function orders() 
   {

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
 
  public function  change_password() 
   {

    
        $data['meta_title']='Change-Pass';
         $data['meta_keywords'] ='';
         $data['meta_description']='';
        
    return view('user.changepw',$data);
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
}
