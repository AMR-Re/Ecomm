<?php

namespace App\Http\Controllers\Admin;
use App\Models\CategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function list()
    { 
       $data['getRecord']=CategoryModel::getRecord();
        $data['header_title']="Category";
        return view('admin.category.list',$data);
    }
    public function add()
    {
        $data['header_title']="Add New Category";
        return view('admin.category.add',$data);

    }
    function insert(Request $request)  
    {
        
        request()->validate([
            'slug'=> 'required|unique:category',
          
         ]);
       // dd($request->all());
       $category=new CategoryModel;
       $category->name=trim($request->name);
       $category->slug=trim($request->slug);
       $category->status=trim($request->status);
       $category->meta_title=trim($request->meta_title);
       $category->meta_description=trim($request->meta_description);
       $category->meta_keywords=trim($request->meta_keywords);
       $category->created_by=Auth::user()->id;
       $category->save();

     

   return redirect('admin/category/list')->with('success' ,'Category has been Successfully Created ');
        
    }

     public function edit($id) 

    { 

          $data['getRecord']=CategoryModel::getSingle($id);
       
          $data['header_title']="Edit Category";
       
          return view('admin.category.edit',$data);
        
    }
    public function update($id,Request $request)
    {
        request()->validate([
            'slug'=> 'required||unique:category,slug,'.$id,
            'status' => 'required|integer',
           
         ]);
         
    $category=CategoryModel::getSingle($id);
    $category->name     =  trim($request->name);
    $category->slug    =  trim($request->slug);
    $category->meta_title    =  trim($request->meta_title);
    $category->meta_description    =  trim($request->meta_description);
    $category->meta_keywords    =  trim($request->meta_keywords);
    $category->created_by=Auth::user()->id;
  //  $category->is_admin = 1;//is_admin attribute
 
    $category->status   = (int) $request->status;
   $category->save();
   
    return redirect('admin/category/list')->with('success' ,'Category has been Successfully updated ');
             //dd($request->all());
    }
    public function delete($id)
    {
        $category=CategoryModel::getSingle($id);
        $category->is_delete=1;
        $category->save();
         

    return redirect()->back()->with('success' ,'Category has been Successfully Deleted ');

      

    }
}
