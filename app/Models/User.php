<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static function getSingle($id)
    {

        return self::find($id);
    }


    static  function getAdmin()
    {
        return self::select('users.*')
            ->where('is_admin', '=', 1)
            ->where('is_delete', '=', 0)
            ->orderby('id', 'desc')
            ->get();
    }
    static  function getCustomer()
    {
       $return=User::select('users.*');
       if(!empty(Request::get('id')))
       {
           $return =$return->where('id','=',Request::get('id'));

       }
      
       if(!empty(Request::get('name')))
       {
           $return =$return->where('name','like','%'.Request::get('name').'%');

       }
      
       if(!empty(Request::get('email')))
       {
           $return =$return->where('email','like','%'.Request::get('email').'%');

       }
       $return=$return->where('is_admin', '=', 0)
            ->where('is_delete', '=', 0)
            ->orderby('id', 'desc')
            ->paginate(30);
            return  $return;
    }

    static function getTotalCustomers(){
        return self::select('id')
        ->where('is_admin', '=', 0)
            ->where('is_delete', '=', 0)
            ->count();
    }
    static function  getTotalTodayCustomers(){
        return self::select('id')
        ->where('is_admin', '=', 0)
        ->where('is_delete', '=', 0)
        ->whereDate('created_at','=',date('y-m-d'))
        ->count();
    }
    
    static function  getTotalCustomerMonth($startDate,$endDate)
    {
        return self::select('id')
        ->where('is_admin', '=', 0)
        ->where('is_delete', '=', 0)
        ->whereDate('created_at','>=',$startDate)
        ->whereDate('created_at','<=',$endDate)
        ->count();
    }
    static function checkEmail($email)
    {
        return self::select('users.*')
        ->where('users.email', '=', $email)
        ->first();
    }
}
