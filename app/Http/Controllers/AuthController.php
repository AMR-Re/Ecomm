<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{
     public function login_admin()
    {  
       if(!empty(Auth::check()) && Auth::user()->is_admin==1)
       {
        return  redirect('admin/dashboard');
       }
        return view('admin.auth.login');

    }
    public function auth_login_admin(Request $request)
    {  
       $remember = !empty ($request->remember) ? true :false;
       if(Auth::attempt(['email' =>$request->email, 'password'=>$request->password,'is_admin'=>1,'status'=>0,'is_delete'=>0], $remember))
{
     return  redirect('admin/dashboard');

}
else{
    return redirect()->back()->with('error',"please Enter correct email and password");
}
    }



    public function logout_admin()
    {
        Auth::logout();
        return redirect('admin');
    }
      

    public function auth_register(Request $request)
    { 
      
        $checkemail=User::checkEmail($request->email);
   //     dd($checkemail);
        if(empty($checkemail))
        {
            $save= new User;
            $save->name=trim($request->name);
            $save->email=trim($request->email);
            $save->password=Hash::make($request->password);
            $save->save();
             
            Mail::to($save->email)->send(new RegisterMail($save));
             $json['status']=true;
             $json['message']='Your Account Successfully Registered,Please Verify youyr email address';
        }
        else
        {
               $json['status']=false;
               $json['message']='This email already registered Please choose  valid email';
        }
        echo json_encode($json);
    }
    public function activate_email($id){
        $id=base64_decode($id);
        $user=USer::getSingle($id);
        $user->email_verified_at=date('Y-m-d H:i:s');
        $user->save();

        return redirect(url(''))->with('success',"Email successfully verified ;)");
    }
}

