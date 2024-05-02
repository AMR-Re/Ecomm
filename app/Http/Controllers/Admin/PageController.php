<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SystemSettingModel;
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
      $system_setting->adddress=trim($request->address);
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
  }

