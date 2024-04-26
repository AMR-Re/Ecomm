<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\PagesModel;
class PageController extends Controller
{
    public function list()
    { 
       $data['getRecord']=PagesModel::getRecord();
        $data['header_title']="Pages";
        return view('admin.pages.list',$data);
    }


     public function edit($id) 

    { 

          $data['getRecord']=PagesModel::getSingle($id);
       
          $data['header_title']="Edit Page ";
       
          return view('admin.pages.edit',$data);
        
    }
    public function update($id,Request $request)
     {
        // dd($request->all());
       
         
    $pages=PagesModel::getSingle($id);
    $pages->name=trim($request->name);
    $pages->title =$request->title;
    $pages->description=$request->description;
    $pages->image_name=$request->imagename;
    $pages->meta_description   =$request->meta_description;
    $pages->meta_title   =$request->meta_title;
    $pages->meta_keywords   =$request->meta_keywords;
    // $pages->created_at   =$request->created_At;

    $pages->save();
    if(!empty($request->file('image')))
    {
      
        $file=$request->file('image');
          $ext= $file->getClientOriginalExtension();
          $randomStr=$pages->id.Str::random(20);
         $filename=strtolower($randomStr).'.'.$ext;
          $file->move('upload/pages/', $filename);

          $pages->image_name=trim($filename);
          $pages->save();


          
    }

   
  return redirect('admin/pages/list')->with('success' ,'Page has been Successfully updated ');
//        dd($request->all());
    }
   
//   
}
