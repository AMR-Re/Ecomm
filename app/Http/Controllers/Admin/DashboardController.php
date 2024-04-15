<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $data['TotalTodayOrder']=OrderModel::getTotalTodayOrder();
        $data['TotalTodayPayments']=OrderModel::getTotalTodayPayments();
        $data['TotalPayments']=OrderModel::getTotalPayments();
        $data['TotalOrder']=OrderModel::getTotalOrder();
        $data['TotalCustomers']=User::getTotalCustomers();
        $data['TotalTodayCustomers']=User::getTotalTodayCustomers();
        $data['LatestOrders']=OrderModel::getLatestOrders();


        if(!empty($request->year))
        {
            $year=$request->year;
        }
        else
        {
            $year=date('Y');
        }
        
        $getTotalCustomerMonth='';
        $getTotalOrderMonth='';
        $getTotalAmountOrderMonth='';
        
        $TotalAmount=0;

        for($month=1;$month<=12;$month++ )
        {
            $startDate=new \DateTime("$year-$month-01");
            $endDate=new \DateTime("$year-$month-01");

            $endDate->modify('last day of this month');

             $startDate=$startDate->format('Y-m-d');
             $endDate=$endDate->format('Y-m-d');

             $customer=User::getTotalCustomerMonth($startDate,$endDate);

             $getTotalCustomerMonth .=$customer .',';

             $order=OrderModel::getTotalOrderMonth($startDate,$endDate);

             $getTotalOrderMonth .=$order .',';

             $orderpayments=OrderModel::getTotalAmountOrderMonth($startDate,$endDate);

             $getTotalAmountOrderMonth .=$orderpayments .',';
             $TotalAmount=$TotalAmount+$orderpayments;
        }

        $date['getTotalCustomerMonth']=rtrim($getTotalCustomerMonth,",");
        $date['TotalAmount']=$TotalAmount;
        $date['year']=$year;


        $data['header_title']="Dashboard";
    return view('admin.dashboard', $data,compact('getTotalCustomerMonth','getTotalOrderMonth','getTotalAmountOrderMonth','TotalAmount','year'));

    }
}
