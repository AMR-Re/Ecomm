<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    
        $data['meta_title']='Orders';
         $data['meta_keywords'] ='';
         $data['meta_description']='';
        
    return view('user.orders',$data);
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
       
   return view('user.editprofile',$data);
 }
}
