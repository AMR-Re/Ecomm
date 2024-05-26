<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SystemSettingModel;
use App\Models\HomeSettingModel;
use App\Models\NotificationModel;
use App\Models\PagesModel;
use App\Models\PaymentSettting;
use App\Models\SmtpSettingModel;

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


     public function contactus()
      {
        $data['getRecord']=ContactUsModel::getRecord();
        $data['header_title']="Contact Us";
        return view('admin.contactus.list',$data);

      }
      public function contactus_delete($id)
      {
        ContactUsModel::where('id','=',$id)->delete();
        return redirect()->back()->with('succes',"Record Deleted Successfully");

      }
    public function system_setting()
    {
     
      $data['getRecord']= SystemSettingModel::getSingle();
     
      $data['header_title']="System Setting ";
      return view('admin.setting.system-setting',$data);
    }

    public function update_system_setting(Request $request) 
    {
      $system_setting=SystemSettingModel::getSingle();

      $system_setting->website_name=trim($request->website_name);
      $system_setting->logo =trim($request->logo);
      $system_setting->favicon=trim($request->favicon);
      $system_setting->footer_payment_icon=trim($request->website_name);
      $system_setting->footer_description=trim($request->footer_description);
      $system_setting->address=trim($request->address);
      $system_setting->phone_num_1=trim($request->phone_num_1);
      $system_setting->phone_num_2=trim($request->phone_num_2);

      $system_setting->submit_email=trim($request->submit_email);
      $system_setting->email=trim($request->email);
      $system_setting->email_2=trim($request->email_2);
      $system_setting->working_hours=trim($request->working_hours);
      $system_setting->facebook_link=trim($request->facebook_link);
      $system_setting->twitter_link=trim($request->twitter_link);
      $system_setting->instagram_link=trim($request->instagram_link);
      $system_setting->youtube_link=trim($request->youtube);
      $system_setting->pintrest_link=trim($request->pintrest_link);
      if(!empty($request->file('logo')))
      {
        
          $file=$request->file('logo');
            $ext= $file->getClientOriginalExtension();
            $randomStr=Str::random(10);
           $filename=strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);
  
            $system_setting->logo=trim($filename);
            
      }
      if(!empty($request->file('favicon')))
      {
        
          $file=$request->file('favicon');
            $ext= $file->getClientOriginalExtension();
            $randomStr=Str::random(10);
           $filename=strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);
  
            $system_setting->favicon=trim($filename);
            
      } 
       if(!empty($request->file('footer_payment_icon')))
      {
        
          $file=$request->file('footer_payment_icon');
            $ext= $file->getClientOriginalExtension();
            $randomStr=Str::random(10);
           $filename=strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);
  
            $system_setting->footer_payment_icon=trim($filename);
            
      }
  
      $system_setting->save();

      return redirect()->back()->with('success' ,'Setting has been Successfully updated ');

    }

    public function payment_setting()  {
    
      $data['getRecord']=PaymentSettting::getSingle();
     
      $data['header_title']="Payment Setting";
      return view('admin.setting.payment-setting',$data);
    }

    public function update_payment_setting(Request $request)  {


      $payment_setting=PaymentSettting::getSingle();
      $payment_setting->paypal_id=trim($request->paypal_id);
      $payment_setting->paypal_status =trim($request->paypal_status);
      $payment_setting->stripe_puplic_key=trim($request->stripe_puplic_key);
      $payment_setting->stripe_secret_key=trim($request->stripe_secret_key);
      $payment_setting->is_cash_delivery=!empty($request->is_cash_delivery)? 1 : 0;
      $payment_setting->is_paypal=!empty($request->is_paypal)? 1 : 0;
      $payment_setting->is_stripe=!empty($request->is_stripe)? 1 : 0;

      $payment_setting->save();

     return redirect()->back()->with('success' ,'Payment Setting has been Successfully updated ');

    }

    public function home_setting()
    {
      $data['getRecord']= HomeSettingModel::getSingle();
     
      $data['header_title']="Home Setting ";
      return view('admin.setting.home-setting',$data);
      
    }

    public function update_home_setting(Request $request)
    {
       
      // dd($request->all());
       $home_setting=HomeSettingModel::getSingle();
       $home_setting->trendy_product_title=trim($request->trendy_product_title);
       $home_setting->shop_category_title =trim($request->shop_category_title);
       $home_setting->recent_arrival_title=trim($request->recent_arrival_title);
      $home_setting->blog_title=trim($request->blog_title);

      $home_setting->payment_delivery_title=trim($request->payment_delivery_title);
      $home_setting->payment_delivery_description=trim($request->payment_delivery_description);

      $home_setting->refund_title=trim($request->refund_title);
      $home_setting->refund_description=trim($request->refund_description);

      $home_setting->support_title=trim($request->support_title);
      $home_setting->support_description=trim($request->support_description);

      $home_setting->signup_title=trim($request->signup_title);
      $home_setting->signup_description=trim($request->signup_description);

      if(!empty($request->file('payment_delivery_image')))
      {
        
          $file=$request->file('payment_delivery_image');
            $ext= $file->getClientOriginalExtension();
            $randomStr=Str::random(10);
           $filename=strtolower($randomStr).'.'.$ext;
            $file->move('upload/homesetting/', $filename);
  
            $home_setting->payment_delivery_image=trim($filename);
            
      }
      if(!empty($request->file('refund_image')))
      {
        
          $file=$request->file('refund_image');
            $ext= $file->getClientOriginalExtension();
            $randomStr=Str::random(10);
           $filename=strtolower($randomStr).'.'.$ext;
            $file->move('upload/homesetting/', $filename);
  
            $home_setting->refund_image=trim($filename);
            
      } 
       if(!empty($request->file('support_image')))
      {
        
          $file=$request->file('support_image');
            $ext= $file->getClientOriginalExtension();
            $randomStr=Str::random(10);
           $filename=strtolower($randomStr).'.'.$ext;
            $file->move('upload/homesetting/', $filename);
  
            $home_setting->support_image=trim($filename);
            
      }
      if(!empty($request->file('signup_image')))
      {
        
            $file=$request->file('signup_image');
            $ext= $file->getClientOriginalExtension();
            $randomStr=Str::random(10);
            $filename=strtolower($randomStr).'.'.$ext;
            $file->move('upload/homesetting/', $filename);
            $home_setting->signup_image=trim($filename);
            
      }
  
      $home_setting->save();

      return redirect()->back()->with('success' ,'Home Setting has been Successfully updated ');

    }

    public function smtp_setting(){
      $data['getRecord']= SmtpSettingModel::getSingle();
     
      $data['header_title']="Smtp Setting ";
      return view('admin.setting.smtp-setting',$data);

    }
    public function  update_smtp_setting(Request $request)
    {
      $smtp_setting=SmtpSettingModel::getSingle();
      $smtp_setting->name=trim($request->name);
      $smtp_setting->mail_mailer=trim($request->mail_mailer);
      $smtp_setting->mail_host =trim($request->mail_host);
      $smtp_setting->mail_username=trim($request->mail_username);
      $smtp_setting->mail_password=trim($request->mail_password);
      $smtp_setting->mail_port=trim($request->mail_port);
      $smtp_setting->mail_encryption=trim($request->mail_encryption);

      $smtp_setting->mail_from_address=trim($request->mail_from_address);
    
     $smtp_setting->save();

     return redirect()->back()->with('success' ,'SMTP Setting has been Successfully updated ');

    }

    public function  notification(){
      
      $data['getRecord']=NotificationModel::getRecord();
      $data['header_title']="Notifications";
      return view('admin.notification.list',$data);
    }
  }

