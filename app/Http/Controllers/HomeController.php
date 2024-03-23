<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
 public function home(){

        $data['meta_title']='Ecommerce';
         $data['meta_keywords'] ='';
         $data['meta_description']='';
        
    return view('home',$data);
 }
}
