<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class DashboardController extends Controller
{

    public function index(){


        $ordersCount= Order::count();
        $completedOrders=Order::where('status',operator: 'completed')->count();
        $pendingOrders=Order::where('status',operator: 'pending')->count();
        $cancelledOrders=Order::where('status',operator: 'cancelled')->count();

        $productsCount=Product::count();

        $usersCount = User::count();

        $totalSales=Order::sum('total_price');

        return view('dashboard.index',compact('ordersCount','productsCount',
        'usersCount','totalSales','completedOrders','pendingOrders','cancelledOrders'));
        
    }

    public function orders()
    {
        $orders=Order::with('user')->latest()->get();
        return view('dashboard.orders.index',compact('orders'));
    }
}
