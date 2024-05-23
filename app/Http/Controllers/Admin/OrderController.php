<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use App\Mail\OrderStatusMail;
use App\Models\NotificationModel;
use Illuminate\Support\Facades\Mail;
class OrderController extends Controller
{
    public function list()
    { 
       $data['getRecord']=OrderModel::getRecord();
        $data['header_title']="Order";
        return view('admin.order.list',$data);
    }
    public function order_detail($id,Request $request) 
      {
        if(!empty($request->notif_id))
        {
          NotificationModel::updateReadNotif($request->notif_id);
        }
        $data['getRecord']=OrderModel::getSingle($id);
        $data['header_title']="Order's Details";
        return view('admin.order.details',$data);
        
     }
public function order_status(Request $request)
{
 $getOrder =OrderModel::getSingle($request->order_id);
 $getOrder->status =$request->status;
 $getOrder->save();
 Mail::to($getOrder->email)->send(new OrderStatusMail($getOrder));
 $user_id=$getOrder->user_id;
 $url=url('user/orders');
 $message="Your Order Status Update #".$getOrder->order_number;
 NotificationModel::insertRecord($user_id,$url,$message);
 $json['message']="Status Successfully Updated!";
 echo json_encode($json);
 }
}
