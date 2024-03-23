<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    { 
        $data['getRecord']=User::getAdmin();

        $data['header_title']="Admin";
        return view('admin.admin.list',$data);
    }
    
    public function add()
    {
        $data['header_title']="Add New Admin";
        return view('admin.admin.add',$data);

    }
    public function insert(Request $request)
    {
         request()->validate([
            'email'=> 'required|email|unique:users',
            'name'=> 'required||unique:users',
            'status' => 'required|integer',
         ]);
    //    dd($request->all());
    //useing strings in blade
    $statusMapping = ['active' => 1, 'inactive' => 0];

    $user=new User();
   $user->name     =  $request->name;
   $user->email    =  $request->email;
   $user->password = Hash::make($request->password);
   $user->is_admin = 1;//is_admin attribute

   $user->status = $statusMapping[$request->status] ?? 0; 
  $user->save();
  
   return redirect('admin/admin/list')->with('success' ,'Admin has been Successfully created ');
} 
public function edit($id)
{
    $data['getRecord']=User::getSingle($id);
    $data['header_title']="Edit Admin";
    return view('admin.admin.edit',$data);


}


public function update($id,Request $request)
    {
        request()->validate([
            'email'=> 'required|email|unique:users,email,'.$id,
            'status' => 'required|integer',
           
         ]);
    //    dd($request->all());

    $user=User::getSingle($id);
   $user->name     =  $request->name;
   $user->email    =  $request->email;
   if (!empty($request->password)) {
    $user->password = Hash::make($request->password);
}
   $user->is_admin = 1;//is_admin attribute

   $user->status   = (int) $request->status;
  $user->save();
  
   return redirect('admin/admin/list')->with('success' ,'Admin has been Successfully updated ');
} 

public function delete($id)
    {
        $user=User::getSingle($id);
        $user->is_delete=1;
        $user->is_admin=0;
        $user->status=(int)1;
        $user->save();

        return redirect()->back()->with('success' ,'Admin has been Successfully Deleted ');
    }
} 