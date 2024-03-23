<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ColorModel;
class ColorController extends Controller
{
    public function list()
    { 
       $data['getRecord']=ColorModel::getRecord();
        $data['header_title']="Color";
        return view('admin.color.list',$data);
    }
    public function add()
    {
        $data['header_title']="Add New Color";
        return view('admin.color.add',$data);

    }

    function insert(Request $request)  
    {
        
        request()->validate([
            'name'=> 'required|unique:color',
            'code'=> 'required|unique:color',

          
         ]);
       // dd($request->all());
       $color=new ColorModel;
       $color->name=trim($request->name);
       $color->code=trim($request->code);    
       $color->created_by=Auth::user()->id;
       $color->save();

     

   return redirect('admin/color/list')->with('success' ,'color has been Successfully Created ');
        
    }

     public function edit($id) 

    { 

          $data['getRecord']=colorModel::getSingle($id);
       
          $data['header_title']="Edit color";
       
          return view('admin.color.edit',$data);
        
    }
    public function update($id,Request $request)
     {
        request()->validate([
            'name'=> 'required|unique:color,name,'.$id,
            'code'=> 'required|unique:color,code,'.$id,

            'status' => 'required|integer',
           
         ]);
         
    $color=colorModel::getSingle($id);
    $color->name = trim($request->name);
    $color->code = trim($request->code);

  
    $color->created_by=Auth::user()->id;
  //  $category->is_admin = 1;//is_admin attribute
  $color->created_at    =  trim($request->created_at);
 
    $color->status   = (int) $request->status;
   $color->save();
   
  return redirect('admin/color/list')->with('success' ,'color has been Successfully updated ');
   //          dd($request->all());
    }
    public function delete($id)
    {
        $color=ColorModel::getSingle($id);
        $color->is_delete=1;
        $color->save();
         

    return redirect()->back()->with('success' ,'color has been Successfully Deleted ');

      

    }
}
