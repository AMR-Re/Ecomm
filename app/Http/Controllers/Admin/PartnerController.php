<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function list()
    { 
       $data['getRecord']=PartnerModel::getRecord();
        $data['header_title']="Partner";
        return view('admin.partner.list',$data);
    }
    public function add()
    {
        $data['header_title']="Add New partner";
        return view('admin.partner.add',$data);

    }

    function insert(Request $request)  
    {
        
    //    dd($request->all());
       $partner=new PartnerModel;
       $partner->button_link=trim($request->button_link);   

       $file= $request->file('image_name');
       $ext= $file->getClientOriginalExtension();
       $randomStr=Str::random(20);
       $filename=strtolower($randomStr).'.'.$ext;
       $file->move('upload/partner/', $filename);
       $partner->image_name  =trim($filename);

       $partner->status  = (int) $request->status;
       $partner->save();

     

   return redirect('admin/partner/list')->with('success' ,'Partner  has been Successfully Created ');
        
    }

     public function edit($id) 

    { 

          $data['getRecord']=PartnerModel::getSingle($id);
       
          $data['header_title']="Edit Partner ";
       
          return view('admin.partner.edit',$data);
        
    }
    public function update($id,Request $request)
     {
        request()->validate([
            
            'status' => 'required|integer',
           
         ]);
         
    $partner=PartnerModel::getSingle($id);
    $partner->button_link=trim($request->button_link);  
    if(!empty($request->file('image_name')))
    {
        $file= $request->file('image_name');
        $ext= $file->getClientOriginalExtension();
        $randomStr=Str::random(20);
        $filename=strtolower($randomStr).'.'.$ext;
        $file->move('upload/partner/', $filename);
        $partner->image_name  =trim($filename);
    
    }
    
    $partner->status   = (int) $request->status;
    $partner->save();
   
  return redirect('admin/partner/list')->with('success' ,'Partner has been Successfully updated ');
 
    }
    public function delete($id)
    {
        $partner=PartnerModel::getSingle($id);
        $partner->is_delete=1;
        $partner->save();
         

    return redirect()->back()->with('success' ,'Partner has been Successfully Deleted ');

      

    }
}
