<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list()
    { 
       $data['getRecord']=OrderModel::getRecord();
        $data['header_title']="Order";
        return view('admin.order.list',$data);
    }
    public function order_detail($id) 
      {
        $data['getRecord']=OrderModel::getSingle($id);
        $data['header_title']="Order's Details";
        return view('admin.order.details',$data);
        
     }

}
