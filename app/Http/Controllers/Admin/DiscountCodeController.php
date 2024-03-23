<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiscountCodeModel;
class DiscountCodeController extends Controller
{
    public function list()
    { 
       $data['getRecord']=DiscountCodeModel::getRecord();
        $data['header_title']="Discount-Code";
        return view('admin.discountcode.list',$data);
    }
    public function add()
    {
        $data['header_title']="Add New Code";
        return view('admin.discountcode.add',$data);

    }

    function insert(Request $request)  
    {
        
        request()->validate([
            'name'=> 'required|unique:discount_code',
         ]);
       // dd($request->all());
       $dcode=new DiscountCodeModel;
       $dcode->name=trim($request->name);
       $dcode->type=trim($request->type);    
       $dcode->percent_amount=trim($request->percent_amount);    
       $dcode->expire_date=trim($request->expire_date);    
       $dcode->status   = (int) $request->status;
       $dcode->save();

     

   return redirect('admin/discount_code/list')->with('success' ,'Discount  has been Successfully Created ');
        
    }

     public function edit($id) 

    { 

          $data['getRecord']=DiscountCodeModel::getSingle($id);
       
          $data['header_title']="Edit Discount Code";
       
          return view('admin.discountcode.edit',$data);
        
    }
    public function update($id,Request $request)
     {
        request()->validate([
            
            'status' => 'required|integer',
           
         ]);
         
    $dcode=DiscountCodeModel::getSingle($id);
    $dcode->name=trim($request->name);
    $dcode->type=trim($request->type);    
    $dcode->percent_amount=trim($request->percent_amount);    
    $dcode->expire_date=trim($request->expire_date);    
    $dcode->status   = (int) $request->status;
    $dcode->save();
   
  return redirect('admin/discount_code/list')->with('success' ,'Code has been Successfully updated ');
   //          dd($request->all());
    }
    public function delete($id)
    {
        $dcode=DiscountCodeModel::getSingle($id);
        $dcode->is_delete=1;
        $dcode->save();
         

    return redirect()->back()->with('success' ,'Discount code has been Successfully Deleted ');

      

    }
}
