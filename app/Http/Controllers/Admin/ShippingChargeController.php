<?php

namespace App\Http\Controllers\Admin;
use App\Models\ShippingChargeModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingChargeController extends Controller
{   
    public function list()
    { 
       $data['getRecord']=ShippingChargeModel::getRecord();
        $data['header_title']="shipping-charge";
        return view('admin.shippingcharge.list',$data);
    }
    public function add()
    {
        $data['header_title']="Add New charge";
        return view('admin.shippingcharge.add',$data);

    }

    function insert(Request $request)  
    {
        
        request()->validate([
            'name'=> 'required|unique:discount_code',
         ]);
       // dd($request->all());
       $shipping=new ShippingChargeModel;
       $shipping->name=trim($request->name);
       $shipping->price=trim($request->price);    
       $shipping->status   = (int) $request->status;
       $shipping->save();

     

   return redirect('admin/shipping_charge/list')->with('success' ,'charge  has been Successfully Created ');
        
    }

     public function edit($id) 

    { 

          $data['getRecord']=ShippingChargeModel::getSingle($id);
       
          $data['header_title']="Edit Charge ";
       
          return view('admin.shippingcharge.edit',$data);
        
    }
    public function update($id,Request $request)
     {
        request()->validate([
            
            'status' => 'required|integer',
           
         ]);
         
    $dcode=ShippingChargeModel::getSingle($id);
    $dcode->name=trim($request->name);
    $dcode->price=trim($request->price);    
    $dcode->status   = (int) $request->status;
    $dcode->save();
   
  return redirect('admin/shipping_charge/list')->with('success' ,'Charge has been Successfully updated ');
   //          dd($request->all());
    }
    public function delete($id)
    {
        $dcode=ShippingChargeModel::getSingle($id);
        $dcode->is_delete=1;
        $dcode->save();
         

    return redirect()->back()->with('success' ,'Discount code has been Successfully Deleted ');

      

    }
}
