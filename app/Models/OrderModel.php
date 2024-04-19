<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
class OrderModel extends Model
{
    protected $table='orders';

    static function getSingle($id) 
     {
        return self::find($id);
        
    }
    static function getRecord()
    {
        $return = OrderModel::select('orders.*');
        if(!empty(Request::get('id')))
        {
            $return =$return->where('id','=',Request::get('id'));

        }
        if(!empty(Request::get('company_name')))
        {
            $return =$return->where('comapny_name','=',Request::get('company_name'));

        }
        if(!empty(Request::get('fname')))
        {
            $return =$return->where('first_name','like','%'.Request::get('first_name').'%');

        }
        if(!empty(Request::get('lname')))
        {
            $return =$return->where('last_name','like','%'.Request::get('last_name').'%');

        }
        if(!empty(Request::get('email')))
        {
            $return =$return->where('email','like','%'.Request::get('email').'%');

        }
        if(!empty(Request::get('country')))
        {
            $return =$return->where('country','like','%'.Request::get('country').'%');

        }
        if(!empty(Request::get('state')))
        {
            $return =$return->where('state','like','%'.Request::get('state').'%');

        }
        if(!empty(Request::get('city')))
        {
            $return =$return->where('city','like','%'.Request::get('city').'%');

        }
        if(!empty(Request::get('tel')))
        {
            $return =$return->where('tel','=',Request::get('tel'));

        }
        
        if(!empty(Request::get('zip')))
        {
            $return =$return->where('zip','=',Request::get('zip'));

        }
       
        if(!empty(Request::get('from_date')))
        {
            $return =$return->whereDate('created_at','>=',Request::get('from_date'));

        }
        if(!empty(Request::get('to_date')))
        {
            $return =$return->whereDate('created_at','<=',Request::get('to_date'));

        }
        $return =$return->where('is_payment','=',1)
        ->where('is_delete','=',0)
        ->orderby('id','desc')
        ->paginate(20);
        return $return;
    }
    public function getShipping(){
        return $this->belongsTo(ShippingChargeModel::class,"shipping_id");
       }
    public function getItem() {
        return $this->hasMany(OrderItemModel::class,"order_id");
    }

    // user part
    static function getUserSingle($user_id,$id) 
    {
        return  OrderModel::select('orders.*')
        ->where('user_id','=',$user_id)
        ->where('id','=',$id)
        ->where('is_payment','=',1)
        ->where('is_delete','=',0)
        ->first();
   }
    static function getUserRecord($user_id)
    {
            return  OrderModel::select('orders.*')
                ->where('user_id','=',$user_id)
                ->where('is_payment','=',1)
                ->where('is_delete','=',0)
                ->orderby('id','desc')
                ->paginate(10);
                
    }
    static function getUserTotalOrder($user_id)
{
    return  self::select('id')
    ->where('user_id','=',$user_id)
    ->where('is_payment','=',1)
        ->where('is_delete','=',0)
        ->count();
    
}
static function getUserTotalTodayOrder($user_id)
{
    return  self::select('id')
    ->where('user_id','=',$user_id)
    ->where('is_payment','=',1)
        ->where('is_delete','=',0)
        ->whereDate('created_at','=',date('y:m:d'))
        ->count();
    
}
static function getUserTotalPayments($user_id){
    return  self::select('id')
    ->where('user_id','=',$user_id)
    ->where('is_payment','=',1)
        ->where('is_delete','=',0)
    
        ->sum('total_amount');
    

}
static function getUserTotalTodayPayments($user_id){
    return  self::select('id')
    ->where('user_id','=',$user_id)
    ->where('is_payment','=',1)
        ->where('is_delete','=',0)
        ->whereDate('created_at','=',date('y:m:d'))
        ->sum('total_amount');
    

}
static function getUserTotalStatus($user_id,$status)
{
    return  self::select('id')
    ->where('status','=',$status)

    ->where('user_id','=',$user_id)

    ->where('is_payment','=',1)
        ->where('is_delete','=',0)
        ->count();

}

    // end user
static function getTotalOrder()
{
    return  self::select('id')
    ->where('is_payment','=',1)
        ->where('is_delete','=',0)
        ->count();
    
}
static function getTotalTodayOrder()
{
    return  self::select('id')
    ->where('is_payment','=',1)
        ->where('is_delete','=',0)
        ->whereDate('created_at','=',date('y:m:d'))
        ->count();
    
}
static function getTotalPayments(){
    return  self::select('id')
    ->where('is_payment','=',1)
        ->where('is_delete','=',0)
    
        ->sum('total_amount');
    

}
static function getTotalTodayPayments(){
    return  self::select('id')
    ->where('is_payment','=',1)
        ->where('is_delete','=',0)
        ->whereDate('created_at','=',date('y:m:d'))
        ->sum('total_amount');
    

}
static function getLatestOrders(){


    $return = OrderModel::select('orders.*')
       ->where('is_payment','=',1)
        ->where('is_delete','=',0)
        ->orderby('id','desc')
        ->limit(10)
        ->get();
        return $return;
}

static function getTotalOrderMonth($startDate,$endDate){
    return self::select('id')
    ->where('is_payment','=',1)
    ->where('is_delete','=',0)
        ->whereDate('created_at','>=',$startDate)
        ->whereDate('created_at','<=',$endDate)
        ->count();
}
static function  getTotalAmountOrderMonth($startDate,$endDate)
{
    return self::select('id')
    ->where('is_payment','=',1)
    ->where('is_delete','=',0)
        ->whereDate('created_at','>=',$startDate)
        ->whereDate('created_at','<=',$endDate)
        ->sum('total_amount');
}

    use HasFactory;
}
