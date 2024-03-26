<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{
    public function login_admin()
    {
        if (!empty(Auth::check()) && Auth::user()->is_admin == 1) {
            return  redirect('admin/dashboard');
        }
        return view('admin.auth.login');
    }
    public function auth_login_admin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1, 'status' => 0, 'is_delete' => 0], $remember)) {
            return  redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', "please Enter correct email and password");
        }
    }



    public function logout_admin()
    {
        Auth::logout();
        return redirect(url(''));
    }


    public function auth_register(Request $request)
    {

        $checkemail = User::checkEmail($request->email);
        //     dd($checkemail);
        if (empty($checkemail)) {
            $save = new User;
            $save->name = trim($request->name);
            $save->email = trim($request->email);
            $save->password = Hash::make($request->password);
            $save->save();

            Mail::to($save->email)->send(new RegisterMail($save));
            $json['status'] = true;
            $json['message'] = 'Your Account Successfully Registered,Please Verify youyr email address';
        } else {
            $json['status'] = false;
            $json['message'] = 'This email already registered Please choose  valid email';
        }
        echo json_encode($json);
    }
    public function activate_email($id)
    {
        $id = base64_decode($id);
        $user = USer::getSingle($id);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect(url(''))->with('success', "Email successfully verified ;)");
    }



    public function auth_login(Request $request)
    {
        $remember = !empty($request->is_remember) ? true : false;
        if (Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password,
                'status' => 0,
                'is_delete' => 0
            ],
            $remember
        )) {

            if (!empty(Auth::user()->email_verified_at)) {
                $json['status'] = true;
                $json['message'] = 'success';
            } else {
                $save = User::getSingle(Auth::user()->id);
                Mail::to($save->email)->send(new RegisterMail($save));
                Auth::logout();
                $json['status'] = false;
                $json['message'] = ' Please Verify  Your  Email in Order To Login';
            }
        } else {
            $json['status'] = false;
            $json['message'] = ' Please Enter  valid Credentials';
        }
        echo json_encode($json);
        //   dd($request->all());
    }
    public function forgot_password(Request $request){
         $data['meta_title']='Forgot Password';
        return view('auth.forgot',$data);

    }

    public function auth_forgot_password(Request $request )
    {

        $user= User::where('email','=',$request->email)->first();
        if(!empty($user))
        {
            $user->remember_token= Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success',"your password recovery success! Please check Your email");

        }
        else
        {
            return redirect()->back()->with('error',"Email not found in the system!");
        }

    }


    public function reset($token){
   
        $user = USer::where('remember_token','=',$token)->first();
        if(empty($user))
        {
            $data['user']=$user;
            $data['meta_title']='Resset Password';
            return view('auth.reset',$data);
        }
        else{
            abort(404);
        }

    }
    public function auth_reset($token,Request $request)  
    {
        if($request->password== $request->cpassword)
        {
            $user=USer::where('remember_token','=',$token)->first();
            $user->password = Hash::make($request->password);
            $user->remember_token= Str::random(30);
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
            return redirect(url(''))->with('success',"your password  successfully reset!");

        }
        else
        {
            return redirect()->back()->with('error',"password not match!");
        }

    }  
}
