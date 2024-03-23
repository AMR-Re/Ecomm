<?php

namespace App\Http\Controllers\Admin;
use App\Models\SubCategoryModel;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function list()
    { 
        $data['getRecord']=SubCategoryModel::getRecord();
        $data['header_title']="sub_Category";
        return view('admin.sub_category.list',$data);
    }
    public function add()
    {
        $data['getCategory']=CategoryModel::getRecord();
        $data['header_title']="Add New Sub Category";
        return view('admin.sub_category.add',$data);

    }
    function insert(Request $request)  
    {
        
        request()->validate([
            'slug'=> 'required|unique:category',
          
         ]);
       // dd($request->all());
       $category=new SubCategoryModel;
       $category->category_id=trim($request->category_id);

       $category->name=trim($request->name);
       $category->slug=trim($request->slug);
       $category->status=trim($request->status);
       $category->meta_title=trim($request->meta_title);
       $category->meta_description=trim($request->meta_description);
       $category->meta_keywords=trim($request->meta_keywords);
       $category->created_by=Auth::user()->id;
       $category->save();

     

   return redirect('admin/sub_category/list')->with('success' ,'Category has been Successfully Created ');
        
    }

     public function edit($id) 

    { 
          $data['getCategory']=CategoryModel::getRecord();
          
          $data['getRecord']=SubCategoryModel::getSingle($id);
       
          $data['header_title']="Edit Sub-Category";
       
          return view('admin.sub_category.edit',$data);
        
    }
    public function update($id,Request $request)
    {
        
         request()->validate([
            'slug'=> 'required||unique:sub_category,slug,'.$id,
            'status' => 'required|integer',
           
         ]);
         
    $sub_category=SubCategoryModel::getSingle($id);
    $sub_category->name     =  trim($request->name);
    $sub_category->slug    =  trim($request->slug);
    $sub_category->meta_title    =  trim($request->meta_title);
    $sub_category->meta_description    =  trim($request->meta_description);
    $sub_category->meta_keywords    =  trim($request->meta_keywords);
    //$sub_category->created_by=Auth::user()->id;
  //  $category->is_admin = 1;//is_admin attribute
 
    $sub_category->status   = (int) $request->status;
   $sub_category->save();
   
    return redirect('admin/sub_category/list')->with('success' ,'Category has been Successfully updated ');
             //dd($request->all());
    }
    public function delete($id)
    {
        $category=SubCategoryModel::getSingle($id);
        $category->is_delete=1;
        $category->save();
         

    return redirect()->back()->with('success' ,'sub-Category has been Successfully Deleted ');

      

    }
     public function get_sub_category(Request $request )
     {
       $category_id=$request->id;
       $get_sub_category=SubCategoryModel::getRecordSubCategory($category_id);
       $html='';
       $html.='<option value="">Select</option>';
       foreach ($get_sub_category as $value)
       { ///conacting strings together
       $html .='<option value="'.$value->id .'">' .$value->name .'</option>';

       }
       $json['html']=$html;
       echo json_encode($json);
     }
}
