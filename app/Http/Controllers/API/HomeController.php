<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fleet;
use App\Models\Customer;
use App\Models\Order;


class HomeController extends Controller
{
    public function index(Type $var = null)
    {
       $data['active_fleet'] = Fleet::count();
       $data['available_fleet'] = Fleet::where('status', 0)->count();
       $data['loading_fleet'] = Fleet::where('status', 1)->count();
       $data['transit_fleet'] = Fleet::where('status', 2)->count();
       $data['customers'] = Customer::count();
       $data['orders'] = Order::count();
       $data['pending_orders'] = Order::where('status', 0)->count();
       $data['dispatched_orders'] = Order::where('status', 2)->count();
       $data['delivered_orders'] = Order::where('status', 3)->count();

       return $data;
    }
}
