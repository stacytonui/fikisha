<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Validator;
use DataTables;


class OrderController extends Controller

{
    // all orders
    public function index($type)
    {
        // $orders = Order::all()->toArray();
        // return array_reverse($orders);
        // return DataTables::collection(Order::all())->make(true);

        
        if ($type == "all") {
            $data = Order::select('*')->orderBy('created_at', 'DESC');
        } elseif($type == "pending") {
            $data = Order::select('*')->where('status',0 )->orderBy('created_at', 'DESC');
        }
         elseif($type == "loading") {
            $data = Order::select('*')->where('status',1 )->orderBy('created_at', 'DESC');
        }
        elseif($type == "dispatched") {
            $data = Order::select('*')->where('status', 2 )->orderBy('created_at', 'DESC');
        }
        
        elseif($type == "delivered") {
            $data = Order::select('*')->where('status',3 )->orderBy('created_at', 'DESC');
        }
        
        

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
   
                        $btn = '<a href="" class="edit btn btn-primary btn-sm">Assign Order</a>';
  
                        return $btn;
                })
                
                ->editColumn('customer_id', function($row){
   
                        $user =  Customer::find($row->customer_id);
 
                        return $user->first_name.' '.$user->last_name;
                })
                
                ->editColumn('status', function($row){

         
                    if ($row->status == 0) {
                        # code...
                        return '<span class="badge badge-pill badge-secondary">Pending</span>';
                    } elseif($row->status == 1) {
                        return '<span class="badge badge-pill badge-info">Loading</span>';
                    }
                     elseif($row->status == 2) {
                        return '<span class="badge badge-pill badge-warning">Dispatched</span>';
                    }
                     elseif($row->status == 3) {
                        return '<span class="badge badge-pill badge-success">Success</span>';
                    }
 
                  
                })
                
                ->rawColumns(['action', 'status', 'customer_id'])
                ->make(true);


    }


}