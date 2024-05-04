<?php

namespace App\Http\Controllers\Admin;
use App\Models\SliderModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SliderController extends Controller
{   
    public function list()
    { 
       $data['getRecord']=SliderModel::getRecord();
        $data['header_title']="Slider";
        return view('admin.slider.list',$data);
    }
    public function add()
    {
        $data['header_title']="Add New Slider";
        return view('admin.slider.add',$data);

    }

    function insert(Request $request)  
    {
        
    //    dd($request->all());
       $slider=new SliderModel;
       $slider->title=trim($request->title);
       $slider->button_name=trim($request->button_name);
       $slider->button_link=trim($request->button_link);   

       $file= $request->file('image_name');
       $ext= $file->getClientOriginalExtension();
       $randomStr=Str::random(20);
       $filename=strtolower($randomStr).'.'.$ext;
       $file->move('upload/slider/', $filename);
       $slider->image_name  =trim($filename);

       $slider->status  = (int) $request->status;
       $slider->save();

     

   return redirect('admin/slider/list')->with('success' ,'Slider  has been Successfully Created ');
        
    }

     public function edit($id) 

    { 

          $data['getRecord']=SliderModel::getSingle($id);
       
          $data['header_title']="Edit Slider ";
       
          return view('admin.slider.edit',$data);
        
    }
    public function update($id,Request $request)
     {
        request()->validate([
            
            'status' => 'required|integer',
           
         ]);
         
    $slider=SliderModel::getSingle($id);
    $slider->title=trim($request->title);
    $slider->button_name=trim($request->button_name);
    $slider->button_link=trim($request->button_link);  
    if(!empty($request->file('image_name')))
    {
        $file= $request->file('image_name');
        $ext= $file->getClientOriginalExtension();
        $randomStr=Str::random(20);
        $filename=strtolower($randomStr).'.'.$ext;
        $file->move('upload/slider/', $filename);
        $slider->image_name  =trim($filename);
    
    }
    
    $slider->status   = (int) $request->status;
    $slider->save();
   
  return redirect('admin/slider/list')->with('success' ,'Slider has been Successfully updated ');
 
    }
    public function delete($id)
    {
        $slider=SliderModel::getSingle($id);
        $slider->is_delete=1;
        $slider->save();
         

    return redirect()->back()->with('success' ,'Slider has been Successfully Deleted ');

      

    }
}
